<?php

class modelUser extends Model {
    static $table = 'users';
    public function validationPhone($phone) {
        if (preg_match('/^\+[0-9]/', $phone) && strlen($phone) == 12) {
           return true;
        } else {
            return false;
        }
    }
    public function validationEmail($email) {
        if (preg_match('/^.+@.+/', $email)) {
            return true;
        } else {
            return false;
        }
    }
    public function validationPassword($password) {
        if (strlen($password) >= 8) {
            $upFlag = false; $lowFlag = false;
            $digitFlag = false; $punctFlag = false;
            $arr_str = str_split($password, 1);
            foreach ($arr_str as $simbol) {
                if(ctype_upper($simbol)) $upFlag = true;
                if(ctype_lower($simbol)) $lowFlag = true;
                if(ctype_digit($simbol)) $digitFlag = true;
                if(ctype_punct($simbol)) $punctFlag = true;
            }
            if($upFlag == true && $lowFlag == true && $digitFlag == true && $punctFlag == true) {
                return true;
            }else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getData($req) {
        if(!empty($req['phone']) && !empty($req['password'])) {
            $data['FUser'] = $this->getOne('phone', $req["phone"]);
            if (!empty($data['FUser'])) {
                if ($req['password'] == $data['FUser'][0]['password']) {
                    /* изменить после добавления хеширования*/
                    $data['users'] = $this->getList(self::$table);
                }
                else {
                    $data["request"] = "<p>Ошибка авторизации!!!</p><p>Неверный пароль!!!</p>";
                }
            } else {
                $data["request"] = "<p>Ошибка авторизации!!!</p><p>Такого пользователя не существует!!!</p>";
            }
        }
        else {
            $data["request"] = "<p>Ошибка авторизации!!!</p><p>Заполните форму!!!</p>";
        }
        return $data;
    }

    public function addUser($req) {
        if(!empty($req['name']) && !empty($req['surname']) && !empty($req['email']) && !empty($req['phone'])
            && !empty($req['address'])  && !empty($req['password']) && !empty($req['repeat_password'])) {
            if($this->validationEmail($req['email'])) {
                if($this->validationPhone($req['phone'])) {
                    if (!empty($data['FUser'])) {
                        if($this->validationPassword($req['password'])) {
                            if($req['password'] == $req['repeat_password']) {
                                $passwordHash = password_hash($req["password"], PASSWORD_DEFAULT);
                                $query = array('name'=> $req["name"],'surname'=> $req["surname"],'email'=> $req["email"],
                                    'phone'=> $req["phone"], 'address' => $req["address"], 'password' =>  $passwordHash);


                                $data["add_user"] = $this->add($query);
                                $data['users'] = $this->getList('users');
                                $data['FUser'] = $this->getOne('phone', $req["phone"]);
                            }
                            else {
                                $data["request"] = "<p>Ошибка регистрации!!!</p><p>Пароли не совпадают!!!</p>";
                            }
                        }
                        else {
                            $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле Пароль правильно!!!</p>";
                        }
                    } else {
                        $data["request"] = "<p>Ошибка регистрации!!!</p><p>Такой пользователь уже существует!!!</p>";
                    }
                }
                else {
                    $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле Телефон правильно!!!</p>";
                }
            }
            else {
                $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле E-mail правильно!!!</p>";
            }


        }
        else {
            $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните форму!!!</p>";
        }
        return $data;
    }

}