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

    public static $rules = array(
        'email' => "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/",
        'phone' => "/^\+[0-9]{11}$/",
        'password' => "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",
    );

    public static $err_req = array(
        'name' => "Заполните  имя",
        'surname' => "Заполните  фамилию",
        'email' => "Заполните E-mail согласно правилам",
        'phone' => "Заполните телефон согласно правилам",
        'address' => "Заполните адрес",
        'password' => "Заполните пароль согласно правилам"
    );

    public function getData($req)
    {
            $this->validation($req);
            if (empty($this->request)) {
                if(!isset($req["phone"]) && !isset($_SESSION['fUser'])) {
                    $req["phone"] = $_SESSION['fUser']["phone"];
                    if ($fUser = $this->getOne('phone', $req["phone"])) {
                        if (password_verify($req['password'], $fUser->password)) {
                            $auth = new Auth();
                            $auth->logIn($fUser);
                        } else {
                            $this->request[] = "Неверный пароль!!!";
                        }
                    } else {
                        $this->request[] = "Такого пользователя не существует!!!";
                    }
                }
                else {
                    $this->request[] = "Ошибка авторизации!!!";
                }
            }
            /*var_dump($this);*/
        return $this;
    }

    public function addUser($req)
    {
        $this->validation($req);
        if ($fUser = $this->getOne('phone', $req["phone"])) {
            $this->request[] = "Такой пользователь уже существует!!!";
        }
        if ($req['password'] != $req['repeat_password']) {
            $this->request[] = "Пароли не совпадают!!!";
        }
        if(empty($this->request)) {
            $passwordHash = password_hash($req["password"], PASSWORD_DEFAULT);
            $query = array('name' => $req["name"], 'surname' => $req["surname"], 'email' => $req["email"],
                'phone' => $req["phone"], 'address' => $req["address"], 'password' => $passwordHash);
            $this->load($query);
            $auth = new Auth();
            $auth->logIn($this);
            $this->add($query);
        }
        return $this;
    }

    function updateUser($req)
    {
        $this->validation($req);
        if (empty($this->request)) {
            $this->update($req, $_SESSION['fUser']['id']);
            $req["password"] = $_SESSION['fUser']['password'];
            $this->load($req);
            $auth = new Auth();
            $auth->logIn($this);

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