<?php

class Database{

    private $host = "localhost";
    private $dbName = "eventmap";
    private $username = "root";
    private $password = "";
    private $connection;

    public function connect(){
        $this->connection = null;

        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e){
            echo 'Connection error: ' . $e->getMessage();
        }

        return $this->connection;
    }
}

?>