<?php
class Model {
    /*public function getData() {
        //static::$table;
    }*/
    public function getList($table)
    {
        $Orm = Orm::Instance();
        $result = $Orm->Select($table)->execute();
        return $result;


    }
    public function getOne($table, $field, $phone) {
        $Orm = Orm::Instance();
        $result = $Orm->Select($table)->where(["$field" => "$phone"])->execute();
        return $result;
    }
    public function add($table, $arrQuery) {
        $Orm = Orm::Instance();
        $result = $Orm->Insert($table)->values($arrQuery)->execute();
        return $result;
    }
    public function update($table, $req, $id) {
        $Orm = Orm::Instance();
        $result = $Orm->Update($table)->values($req)->where(['id' => "$id"])->execute();
        return $result;
    }
    public function delete($table, $id) {
        $Orm = Orm::Instance();
        $result = $Orm->Delete($table)->where(['id'=>"$id"])->execute();
        return $result;
    }
}
