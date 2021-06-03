<?php

class modelUser extends Model {
    public function getData()
    {
        $Orm = new Orm;
        $result = $Orm->Select('users')->execute();
        return $result;
    }
    public function getFUser() {
        $Orm = new Orm;
        $result = $Orm->Select('users')->where(['name' => '= Alex']);
        return $result;
    }

}