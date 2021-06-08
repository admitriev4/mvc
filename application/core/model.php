<?php
class Model {
    public function getList($table)
    {
        $Orm = Orm::Instance();
        $result = $Orm->Select($table)->execute();
        return $result;
    }
    public function getOne($field, $phone) {
        $Orm = Orm::Instance();
        $result = $Orm->Select(static::$table)->where(["$field" => "$phone"])->execute();
        return $result;
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

}
