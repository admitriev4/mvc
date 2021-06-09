<?php
class Model {

    /* изменить возвращаемые значения на объекты*/
    public function getList()
    {
        $Orm = Orm::Instance();
        $result = $Orm->Select(static::$table)->execute();
        return $result;
    }
    public function getOne($field, $phone) {
        $Orm = Orm::Instance();
        $result = $Orm->Select(static::$table)->where(["$field" => "$phone"])->execute();
        return $result[0];
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
    public function load() {
        /* реализовать запись в поля объекта массива данных*/
    }

}
