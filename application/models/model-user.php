<?php

class modelUser extends Model {
    static $table = 'user';
    public function getData()
    {
        $Orm = new Orm;
        $result = $Orm->Select('users')->execute();
        return $result;
    }
    public function getFUser($phone) {
        $Orm = new Orm;
        $result = $Orm->Select('users')->where(['phone' => "$phone"])->execute();
        return $result;
    }
    public function addUser($req) {
        $Orm = new Orm;
        $result = $Orm->Insert('users')
            ->values(['name'=> $req["name"],'surname'=>$req["surname"],'email'=>$req["email"],
                'phone'=>$req["phone"], 'address'=> $req["address"], 'password' => $req["password"]])
            ->execute();
        return $result;
    }


}