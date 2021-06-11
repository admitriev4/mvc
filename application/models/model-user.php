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

    public function getData($req)
    {
        /* Добавить нормальную валидацию*/
        if (!empty($req['phone']) && !empty($req['password'])) {
            if ($fUser = $this->getOne('phone', $req["phone"])) {
                /*if ($req['password'] == $fUser->password) {*/
                if (password_verify($req['password'], $fUser->password)) {
                    $auth = new Auth();
                    $auth->logIn($fUser);
                } else {
                    $this->request = "<p>Ошибка авторизации!!!</p><p>Неверный пароль!!!</p>";
                }
            } else {
                $this->request = "<p>Ошибка авторизации!!!</p><p>Такого пользователя не существует!!!</p>";
            }
        } else {
            $this->request = "<p>Ошибка авторизации!!!</p><p>Заполните форму!!!</p>";
        }
        return $this;
    }

    public function addUser($req)
    {
        /*sS1_sS1_ валидный пароль*/
        /* Поменять валидацию*/
        if (!empty($req['name']) && !empty($req['surname']) && !empty($req['email']) && !empty($req['phone'])
            && !empty($req['address']) && !empty($req['password']) && !empty($req['repeat_password'])) {



            /* место под валидацию*/




            if (!$fUser = $this->getOne('phone', $req["phone"])) {
                if ($req['password'] == $req['repeat_password']) {
                    $passwordHash = password_hash($req["password"], PASSWORD_DEFAULT);
                    $query = array('name' => $req["name"], 'surname' => $req["surname"], 'email' => $req["email"],
                        'phone' => $req["phone"], 'address' => $req["address"], 'password' => $passwordHash);
                    $this->load($query);
                    $auth = new Auth();
                    $auth->logIn($this);
                    $this->add($query);

                } else {
                    $this->request = "<p>Ошибка регистрации!!!</p><p>Пароли не совпадают!!!</p>";
                }
            } else {
                $this->request = "<p>Ошибка регистрации!!!</p><p>Такой пользователь уже существует!!!</p>";
            }


            /* место под валидацию*/




        } else {
            $this->request = "<p>Ошибка регистрации!!!</p><p>Заполните форму!!!</p>";
        }
        return $this;
    }

    function updateUser($req)
    {
        /*добавить нормальную валидацию*/
        if (!empty($req['name']) && !empty($req['surname']) && !empty($req['email']) && !empty($req['phone']) && !empty($req['address'])) {
            $this->update($req, $_SESSION['fUser']['id']);
            $req["password"] = $_SESSION['fUser']['password'];
            $this->load($req);
            $auth = new Auth();
            $auth->logIn($this);

        } else {
            $this->request = "<p>Заполните форму!!!</p>";
        }


        return $this;
    }

    function updatePassUser($req)
    {
        /*sS1_sS1_ валидный пароль*/
        /* добавить нормальную валидацию*/
        if (!empty($req['old_password']) && !empty($req['password']) && !empty($req['repeat_password'])) {
            if (password_verify($req['old_password'], $_SESSION['fUser']['password'])) {
                if ($req['password'] == $req['repeat_password']) {
                    $field['password'] = password_hash($req["password"], PASSWORD_DEFAULT);
                    $this->update($field, $_SESSION['fUser']['id']);
                } else {
                    $this->request = "<p>Пароли не совпадают!!!</p>";
                }

            } else {
                $this->request = "<p>Старый пароль не верен!!!</p>";
            }
        } else {
            $this->request = "<p>Заполните форму!!!</p>";
        }
        return $this;
    }

}