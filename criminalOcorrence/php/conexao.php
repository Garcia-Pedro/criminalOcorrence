<?php

class Conexao{
    private $conn;
    private $host = "localhost";
    private $dbname = "criminal_ocorrence";
    private $user = "root";
    private $passwd  = "";
    private $charset = "utf8";

    public function getConn(){
        if (!isset($this->conn)) {
            $this->conn = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset='.$this->charset.';', $this->user, $this->passwd);

            return $this->conn;
        }
    }
}

$conn = new Conexao;