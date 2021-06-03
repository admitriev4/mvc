<?php
include_once ("dbconfig.php");
class Orm {
    protected $pdo;
    protected $sql_query;
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
        $this->sql_query = "";
        $this->values_for_exec = array();
    }
    public function Select($table) {
        $this->sql_query = "SELECT * FROM `users`";
        return $this;
    }
    public function where ($where, $op = '=') {
        $vals = array();
        foreach ($where as $k => $v) {
            $vals[] = "`$k` $op :$k";
            $this->values_for_exec[":".$k] = $v;
        }
        $str = implode(" AND ", $vals);
        $this->sql_query .= $str;
        return $this;
    }

    public function execute() {
        $q = $this->pdo->prepare($this->sql_query);
        $q->execute($this->values_for_exec);
        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        return $q->fetchall();
    }

}
