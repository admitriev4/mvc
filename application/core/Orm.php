<?php
include_once("dbconfig.php");
class Orm {
    protected $pdo;
    protected $sql_query;
    public static $instance;
    private $type;
    private $values_for_exec;
    function __construct() {
        $this->sql_query = "";
        $this->values_for_exec = array();
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO("mysql:host=localhost;dbname=".DB,User,Password, $opt);
        $this->pdo->exec("SET CHARSET utf8");
    }

    private function set_default(){
        $this->type = "";
        $this->sql_query = "";
        $this->values_for_exec = array();
    }

    public static function Instance() {
        if(self::$instance == NULL) {
            self::$instance = new Orm();
        }
        return self::$instance;
    }

    public function Select($table) {
        $this->sql_query = "SELECT * FROM `".$table."`";
        $this->type = 'select';
        return $this;
    }
    public function Count($table) {
        $this->sql_query = "SELECT COUNT(*) FROM `".$table."`";
        $this->type = 'select';
        return $this;
    }

    public function where ($where, $op = '=') {
        $vals = array();
        foreach ($where as $k => $v) {
            $vals[] = "`$k` $op :$k";
            $this->values_for_exec[":".$k] = $v;
        }
        $str = implode(" AND ", $vals);
        $this->sql_query .= " WHERE " . $str;
        return $this;
    }

    public function Insert($table) {
        $this->sql_query = "INSERT INTO `".$table."`";
        $this->type = 'insert';
        return $this;
    }

    public function Update($table) {
        $this->sql_query = "UPDATE `".$table."`";
        $this->type = "update";
        return $this;
    }

    public function Delete($table) {
        $this->sql_query = "DELETE FROM `".$table."`";
        $this->type = "delete";
        return $this;
    }

    public function values($arr_val) {
        $cols = array();
        $masks = array();
        $val_to_update = array();

        foreach ($arr_val as $k => $v) {
            $value_key = explode(" ", $k);
            $value_key = $value_key[0];
            $cols[] = "`$value_key`";
            $masks[] = ':'.$value_key;

            $val_to_update[] = "`$value_key` = :$value_key";
            $this->values_for_exec[":$value_key"] = $v;
        }
        if($this->type == "insert") {
            $cols_all = implode(",", $cols);
            $masks_all = implode(",", $masks);
            $this->sql_query .= "($cols_all) VALUES ($masks_all)";
        }
        else if ($this->type == "update") {
            $this->sql_query .= " SET ";
            $this->sql_query .= implode(',', $val_to_update);
        }

        return $this;
    }

    public function limit($from, $to = NULL){
        $res_str = "";
        if($to == NULL){
            $res_str = $from;
        }else{
            $res_str = $from . ", " . $to;
        }
        $this->sql_query .= " LIMIT " . $res_str;
        return $this;
    }

    public function execute() {
        $q = $this->pdo->prepare($this->sql_query);
        $q->execute($this->values_for_exec);


        if($q->errorCode() != PDO::ERR_NONE){
            $info = $q->errorInfo();
            die($info[2]);
        }
        if($this->type == "select"){
            $this->set_default();
            return $q->fetchall();
        }else if($this->type == 'insert'){
            $this->set_default();
            return $this->pdo->lastInsertId();
        }else{
            $this->set_default();
            return true;
        }
    }

}
