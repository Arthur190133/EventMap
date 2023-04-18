<?php

class Admin{
    private $connection;
    private $table = 'admin';

    //parametres
    public $AdminId;
    public $AdminStartDate;
    public $AdminEndDate;
    public $UserId;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function read(){
        $query = 'SELECT 
        admin.AdminId,
        admin.AdminStartDate,
        admin.AdminEndDate,
        admin.UserId
        FROM ' . $this->table .' admin
        ';

        $stmt = $this->connection->prepare($query);
        $stmt->execute(); 
        return $stmt;
    }

    public function readSingle(){
        $query = 'SELECT 
        admin.AdminId,
        admin.AdminStartDate,
        admin.AdminEndDate,
        admin.UserId
        FROM ' . $this->table .' admin
        WHERE admin.AdminId = ? 
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->BindParam(1, $this->AdminId);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->AdminId = $row['Id'];
        $this->AdminStartDate = $row['StartDate'];
        $this->AdminEndDate = $row['AdminEndDate'];
        $this->UserId = $row['UserId'];

        return $stmt;
    }

    public function IsAdmin(){
        $query = 'SELECT 
        admin.AdminId,
        FROM ' . $this->table .' admin
        WHERE admin.UserId = ? 
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->BindParam(1, $this->UserId);

        $stmt->execute();

        if($stmt){
            return true;
        }
        else{
            return false;
        }


    }
}



?>