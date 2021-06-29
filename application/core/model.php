<?php
class Model {
public $request;
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
    public function getCountPage() {
        $Orm = Orm::Instance();
        $result = $Orm->Count(static::$table)->execute();
        return ceil($result[0]['COUNT(*)']/static::$countToPage);
    }

    public function getPaginateList($page=1) {
        $limitFrom = ($page - 1)*static::$countToPage;
        if($limitFrom == 1) $limitFrom = 0;
        $limitTo = $page*static::$countToPage;
        /*$limitTo = ($page*static::$countToPage) - 1;*/
        $Orm = Orm::Instance();
        $result = $Orm->Select(static::$table)->limit($limitFrom, $limitTo)->execute();
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
    public function validation($req) {
        foreach ($req as $key => $value) {
            if(!empty($value)) {
                if(array_key_exists($key, static::$rules)) {
                    if (!preg_match(static::$rules[$key], $value)) {
                        $this->request[$key] = static::$err_req[$key];

                    }
                }
            }
            else {
                if(array_key_exists($key, static::$err_req)) {
                    $this->request[$key] = static::$err_req[$key];
                }
            }
        }
        return $this;
    }
    public function load($arr) {
        foreach ($arr as $property => $value) {
            if(property_exists(get_class($this), $property)) {
                $this->$property = $value;
            }
        }
    }

}
