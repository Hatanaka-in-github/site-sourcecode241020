<?php


namespace db;

use PDO;


class DataSource{


      private $conn;


    public function __construct($port = '3306',$username = 'admin')
    {
        $dsn = "mysql:host={$GLOBALS['hostphrase']};port='3306';dbname={$GLOBALS['name']};";
        $this->conn = new PDO($dsn, $username, $GLOBALS['pass']);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    }

    public function QuerySql($sql="") {
      $this->conn->query($sql);
    }

    public function begin(){
        $this->conn->beginTransaction();
    }

    public function commit(){
        $this->conn->commit();
    }

    public function rollback(){
        $this->conn->rollback();
    }

    public function SelectSumAll($sql=""){
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

        /* https://webukatu.com/wordpress/blog/23120/ */
    public function SelectSumAllarray($sql=""){
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function Select($sql=""){
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function SelectSum($sql=""){
        $result = $this->SelectSumAll($sql);
        return count($result) > 0 ? $result[0] : false;
    }

    //public function execute($sql = "", $params = []) {
    //    $this->executeSql($sql, $params);
    //    return  $this->sqlResult;
    //}

    //private function executeSql($sql, $params) {
    //    $stmt = $this->conn->prepare($sql);
    //    $this->sqlResult = $stmt->execute($params);
    //    return $stmt;
    //}

    //public function select($sql = "", $params = []) {
    //    $stmt = $this->executeSql($sql, $params);
    //    return $stmt->fetchAll();
    //}

    //public function selectOne($sql = "", $params = []) {
    //    $result = $this->select($sql, $params);
    //    return count($result) > 0 ? $result[0] : false;
    //}



    


}
