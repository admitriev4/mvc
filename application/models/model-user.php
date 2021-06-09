<?php

class modelUser extends Model
{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $address;
    public $password;
    static $table = 'users';

    public function validationPhone($phone)
    {
        if (preg_match('/^\+[0-9]/', $phone) && strlen($phone) == 12) {
            return true;
        } else {
            return false;
        }
    }

    public function validationEmail($email)
    {
        if (preg_match('/^.+@.+/', $email)) {
            return true;
        } else {
            return false;
        }
    }

    public function validationPassword($password)
    {
        if (strlen($password) >= 8) {
            $upFlag = false;
            $lowFlag = false;
            $digitFlag = false;
            $punctFlag = false;
            $arr_str = str_split($password, 1);
            foreach ($arr_str as $simbol) {
                if (ctype_upper($simbol)) $upFlag = true;
                if (ctype_lower($simbol)) $lowFlag = true;
                if (ctype_digit($simbol)) $digitFlag = true;
                if (ctype_punct($simbol)) $punctFlag = true;
            }
            if ($upFlag == true && $lowFlag == true && $digitFlag == true && $punctFlag == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getData($req)
    {
        /* Добавить нормальную валидацию*/
        if (!empty($req['phone']) && !empty($req['password'])) {
            $data['FUser'] = $this->getOne('phone', $req["phone"]);
            if (!empty($data['FUser'])) {

                if (password_verify ($req['password'], $data["FUser"]["password"])) {
                    $data['users'] = $this->getList(self::$table);
                } else {
                    $data["request"] = "<p>Ошибка авторизации!!!</p><p>Неверный пароль!!!</p>";
                }
            } else {
                $data["request"] = "<p>Ошибка авторизации!!!</p><p>Такого пользователя не существует!!!</p>";
            }
        } else {
            $data["request"] = "<p>Ошибка авторизации!!!</p><p>Заполните форму!!!</p>";
        }
        return $data;
    }

    public function addUser($req)
    {
        /* Поменять валидацию*/
        if (!empty($req['name']) && !empty($req['surname']) && !empty($req['email']) && !empty($req['phone'])
            && !empty($req['address']) && !empty($req['password']) && !empty($req['repeat_password'])) {
            if ($this->validationEmail($req['email'])) {
                if ($this->validationPhone($req['phone'])) {
                    if (!empty($data['FUser'])) {
                        if ($this->validationPassword($req['password'])) {
                            if ($req['password'] == $req['repeat_password']) {
                                $passwordHash = password_hash($req["password"], PASSWORD_DEFAULT);
                                $query = array('name' => $req["name"], 'surname' => $req["surname"], 'email' => $req["email"],
                                    'phone' => $req["phone"], 'address' => $req["address"], 'password' => $passwordHash);


                                $data["add_user"] = $this->add($query);
                                $data['users'] = $this->getList();
                                $data['FUser'] = $this->getOne('phone', $req["phone"]);
                            } else {
                                $data["request"] = "<p>Ошибка регистрации!!!</p><p>Пароли не совпадают!!!</p>";
                            }
                        } else {
                            $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле Пароль правильно!!!</p>";
                        }
                    } else {
                        $data["request"] = "<p>Ошибка регистрации!!!</p><p>Такой пользователь уже существует!!!</p>";
                    }
                } else {
                    $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле Телефон правильно!!!</p>";
                }
            } else {
                $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните поле E-mail правильно!!!</p>";
            }
        } else {
            $data["request"] = "<p>Ошибка регистрации!!!</p><p>Заполните форму!!!</p>";
        }
        return $data;
    }

    function updateUser($req)
    {
        /*добавить нормальную валидацию*/

        if (!empty($req['name']) && !empty($req['surname']) && !empty($req['email']) && !empty($req['phone']) && !empty($req['address'])) {
            $data = $this->update($req, $req['id']);
        } else {
            $data['id'] = $req["id"];
            $data["request"] = "<p>Заполните форму!!!</p>";
        }


        return $data;
    }

    function updatePassUser($req)
    {
        /*sS1_sS1_ валидный пароль*/
        /* добавить нормальную валидацию*/
        if (!empty($req['old_password']) && !empty($req['password']) && !empty($req['repeat_password'])) {
            $FUser = $this->getOne('id', $req["id"]); //избавиться при добавлении авторизации
            if ($FUser['password'] == $req['old_password']) {

                if ($req['password'] == $req['repeat_password']) {
                    $passwordHash = password_hash($req["password"], PASSWORD_DEFAULT);
                    $field['password'] = $passwordHash;
                    $data = $this->update($field, $req["id"]);

                } else {
                    $data['id'] = $req["id"];
                    $data["request"] = "<p>Пароли не совпадают!!!</p>";
                }

            } else {
                $data['id'] = $req["id"];
                $data["request"] = "<p>Старый пароль не верен!!!</p>";
            }
        } else {
            $data['id'] = $req["id"];
            $data["request"] = "<p>Заполните форму!!!</p>";
        }
        return $data;
    }

}