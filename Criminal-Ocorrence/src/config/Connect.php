<?php

/**
 * Connect
 *
 * Connecting with database
 *
 * @author Garcia Pedro <garciapedro.php@gmail.com>
 * @author Crisvan dos Santos <csdesigner.05@gmail.com>
 */

class Connect{
    private $host = "localhost";
    private $user = "root";
    private $dbname = "criminal_ocorrence";
    private $password = "";

    public function getConn()
    {
        try {
            $conn = new \PDO(
                "mysql:host=".$this->host . ";" .
                "dbname=" .$this->dbname,
                $this->user,
                $this->password
            );
            return $conn;
        } catch (PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage();
        }
    }
}