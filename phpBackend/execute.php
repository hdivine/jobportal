<?php

class Execute extends Dbh {

    private $sql;
    private $sqlParam;

    protected function getParam($sql, $sqlParam) {
        $this->sql = $sql;
        $this->sqlParam = $sqlParam;
    }

    protected function exec() {
        $result = $this->connect()->prepare($this->sql);
        $result->execute($this->sqlParam);
        return $result;  
    }

}