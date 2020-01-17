<?php

class Dbh {
    private $hostName;
    private $dbName;
    private $usrName;
    private $password;

    protected function connect() {
        $this->hostName = "localhost";
        $this->dbName = "minor";
        $this->usrName = "root";
        $this->password = "";

        $dbh = "mysql:host=".$this->hostName."; dbName=".$this->dbName.";";

        try {
            $conn = new PDO($dbh,$this->usrName,$this->password );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}