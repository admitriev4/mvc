<?php
class Model {
public $request;
    /* изменить возвращаемые значения на объекты*/
    public function getList()
    {
        $Orm = Orm::Instance();
        $result = $Orm->Select(static::$table)->execute();
        foreach ($result as $user) {
            $obj = new static();
            $obj->load($user);
            $arrObj[] = $obj;
        }

        return $arrObj;
    }
    public function getOne($field, $value) {
        $Orm = Orm::Instance();
        $obj = new static();
        $result = $Orm->Select(static::$table)->where(["$field" => "$value"])->execute();
        if($result) {
            $obj->load($result[0]);
            return $obj;
        }
        else {
            return false;
        }

    }
    public function add($arrQuery) {
        $Orm = Orm::Instance();
        if ($Orm->Insert(static::$table)->values($arrQuery)->execute()) {
            return true;
        }
        else {
            return false;
        }
    }
    public function update($req, $id) {
        $Orm = Orm::Instance();
        if ($Orm->Update(static::$table)->values($req)->where(['id' => "$id"])->execute()) {
            return true;
        }
        else {
            return false;
        }

    }
    public function delete($id) {
        $Orm = Orm::Instance();
        if ($Orm->Delete(static::$table)->where(['id'=>"$id"])->execute()) {
            return true;
        }
        else {
            return false;
        }
    }
    public function validation() {
        /* перенести валидацию сюда  и сделать ее нормальной */

        /*public function validationPhone($phone)
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
        }*/



    }
    public function load($arr) {
        foreach ($arr as $property => $value) {
            if(property_exists(get_class($this), $property)) {
                $this->$property = $value;
            }
        }
    }

}
