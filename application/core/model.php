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
    public function add( $arrQuery) {
        $Orm = Orm::Instance();
        $result = $Orm->Insert(static::$table)->values($arrQuery)->execute();
        return $result;
    }
    public function update($req, $id) {
        $Orm = Orm::Instance();
        $result = $Orm->Update(static::$table)->values($req)->where(['id' => "$id"])->execute();
        return $result;
    }
    public function delete($id) {
        $Orm = Orm::Instance();
        $result = $Orm->Delete(static::$table)->where(['id'=>"$id"])->execute();
        return $result;
    }
    public function validation() {
        /* перенести валидацию сюда  и сделать ее нормальной */
    }
    public function load($arr) {
        foreach ($arr as $property => $value) {
            if(property_exists(get_class($this), $property)) {
                $this->$property = $value;
            }
        }
    }

}
