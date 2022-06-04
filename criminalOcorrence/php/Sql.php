<?php
require_once('conexao.php');

class Sql{
    private $conn;
    private $stmt;

    public function query($sql)
    {
        $this->conn = new Conexao;
        $this->stmt = $this->conn->getConn()->prepare($sql);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value); 
    }

    public function exec()
    {
        return $this->stmt->execute();
        return "Operação Efectuada!";
    }

    public function getResult()
    {
        $this->exec();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllResults()
    {
        $this->exec();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



