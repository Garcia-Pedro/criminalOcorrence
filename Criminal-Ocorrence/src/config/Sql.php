<?php
require_once('Connect.php');

/**
 * Sql.
 *
 * Data access object.
 *
 * @author Garcia Pedro <garciapedro.php@gmail.com>
 * @author Crisvan dos Santos <csdesigner.05@gmail.com>
 */

class Sql
{
    private $stmt;
    
    public function query($sql)
    {
        $conn = new Connect;
        $this->stmt = $conn->getConn()->prepare($sql);
    }
    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }
    public function execute()
    {
        return $this->stmt->execute();
        return true;
    }
    public function getResult(){
        $this->execute(); 
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getResults()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}