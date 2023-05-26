<?php

class Admin{
    private $connection;
    private $table = 'admin';

    //parametres
    public $AdminId;
    public $AdminStartDate;
    public $AdminEndDate;
    public $UserId;

    //user
    public $UserName;
    public $UserFirstName;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function readAll(){
        $query = 'SELECT 
        admin.AdminId,
        admin.AdminStartDate,
        admin.AdminEndDate,
        admin.UserId,
        user.UserName,
        user.UserFirstName
        FROM ' . $this->table .' admin 
        LEFT JOIN
            user user ON admin.UserId = user.UserId 
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
        admin.UserId,
        user.UserName,
        user.UserLastName
        FROM ' . $this->table .' admin
        
        LEFT JOIN
            user user ON admin.UserId = user.UserId 
        WHERE admin.AdminId = ? 
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->BindParam(1, $this->AdminId);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->AdminId = $row['AdminId'];
        $this->AdminStartDate = $row['AdminStartDate'];
        $this->AdminEndDate = $row['AdminEndDate'];
        $this->UserId = $row['UserId'];

        return $stmt;
    }

    public function IsAdmin(){
        $query = 'SELECT 
        admin.AdminId,
        admin.AdminStartDate,
        admin.AdminEndDate,
        admin.UserId
        FROM ' . $this->table .' admin
        WHERE admin.UserId = ? 
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->BindParam(1, $this->UserId);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->AdminId = $row['AdminId'];
        $this->AdminStartDate = $row['AdminStartDate'];
        $this->AdminEndDate = $row['AdminEndDate'];
        $this->UserId = $row['UserId'];
        
        return $stmt;
    }


    public function delete(){
        $query = 'DELETE FROM ' . $this->table .' 
        WHERE AdminId = :Id';

        $stmt = $this->connection->prepare($query);

        $this->AdminId = htmlspecialchars(strip_tags($this->AdminId));

        $stmt->bindParam(':Id', $this->UserId);

        if($stmt->execute()){
            return true;
        }
        else{
            printf("Error: %s. \n", $stmt->error);
            return false;
        }
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table . '
        AdminStartDate = :StartDate,
        AdminEndDate = :EndDate,
        UserId = :Id';
        
        $stmt = $this->connection->prepare($query);

        $this->AdminStartDate = htmlspecialchars(strip_tags($this->AdminStartDate));
        $this->AdminEndDate = htmlspecialchars(strip_tags($this->AdminEndDate));
        $this->UserId = htmlspecialchars(strip_tags($this->UserId));
        $this->AdminStartDate = date('Y-m-d', strtotime($this->AdminStartDate));

        $stmt->bindParam(':Id', $this->UserId);
        $stmt->bindParam(':StartDate', $this->AdminStartDate);
        $stmt->bindParam(':EndDate', $this->AdminEndDate);
        
        
        if($stmt->execute()){
            return true;
        }
        else{
            printf("Error: %s. \n", $stmt->error);
            return false;
        }
    }

    public function readWarn(){
        $query = 'SELECT 
        userwarned.UserWarnedContext,
        userwarned.UserWarnedStartDate,
        userwarned.UserWarnedEndDate
        userwarned.UserId,
        userwarned.SuperAdminId,
        FROM ' . $this->table .' userwarned';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->UserWarnedContext = $row['UserWarnedContext'];
        $this->UserWarnedStartDate = $row['UserWarnedStartDate'];
        $this->UserWarnedEndDate = $row['UserWarnedEndDate'];
        $this->UserId = $row['UserId'];
        $this->SuperAdminId = $row['SuperAdminId'];
        
        return $stmt;
    }
    
}



?>