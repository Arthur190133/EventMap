<?php

class Notification{
    // Database
    private $connection;
    private $table = 'notification';

    // propriétés des notifications
    public $NotificationId;
    public $NotificationSender;
    public $NotificationContext;
    public $NotificationStatus;
    public $NotificationDate;
    public $UserId;
    public $UserName;
    public $UserLastName;
    public $UserAvatarDir;
    public $UserAvatarName;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer toutes les notifications
    public function readAll()
    {
        $query = 'SELECT
        notification.NotificationId,
        notification.NotificationSender,
        notification.NotificationContext,
        notification.NotificationStatus,
        notification.NotificationDate,
        notification.UserId,
        user.UserName as UserName,
        user.UserFirstName as UserFirstName,
        image.ImageDir as UserAvatarDir,
        image.ImageDir as UserAvatarName
        FROM ' . $this->table .' notification 
        LEFT JOIN user user ON notification.UserId = user.UserId
        LEFT JOIN image image ON user.UserAvatarId = image.ImageId
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    // récuperer une seule notification
    public function readSingle()
    {
        $query = 'SELECT
                    notification.NotificationId,
        notification.NotificationSender,
        notification.NotificationContext,
        notification.NotificationStatus,
        notification.NotificationDate,
        notification.UserId,
        user.UserName as UserName,
        user.UserFirstName as UserFirstName,
        image.ImageDir as UserAvatarDir,
        image.ImageDir as UserAvatarName
        FROM ' . $this->table .' notification 
        LEFT JOIN user user ON notification.UserId = user.UserId
        LEFT JOIN image image ON user.UserAvatarId = image.ImageId
        WHERE
        notification.NotificationId = ?
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->NotificationId);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $this->NotificationId = $row['NotificationId'];
            $this->NotificationSender = $row['NotificationSender'];
            $this->NotificationContext = $row['NotificationContext'];
            $this->NotificationStatus = $row['NotificationStatus'];
            $this->NotificationDate = $row['NotificationDate'];
            $this->UserId = $row['UserId'];
        }

        return $stmt;
        



        
    }

    // récuperer toutes les notifiaction relatives à un seul utilisateur
    public function readUser(){

        $query = 'SELECT
        notification.NotificationId,
        notification.NotificationSender,
        notification.NotificationContext,
        notification.NotificationStatus,
        notification.NotificationDate,
        notification.UserId,
        user.UserName as UserName,
        user.UserFirstName as UserFirstName,
        image.ImageDir as UserAvatarDir,
        image.ImageName as UserAvatarName 
        FROM ' . $this->table .' notification 
        LEFT JOIN user user ON notification.UserId = user.UserId 
        LEFT JOIN image image ON user.UserAvatarId = image.ImageId 

        WHERE
        notification.UserId = ?
        AND
        notification.NotificationStatus = 0
        ORDER BY 
        notification.NotificationDate DESC
        ';

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->UserId);

        $stmt->execute();

        return $stmt;
    }

    public function updateStatus(){
        $querry = 'UPDATE ' . $this->table . '
        SET
            NotificationStatus = 1
        WHERE
            NotificationId = :Id';
    $stmt = $this->connection->prepare($querry);


    //bind data
    $stmt->bindParam(':Id', $this->NotificationId);

    // requete
    if($stmt->execute()){
        return true;
    }
    else{
        // Print Error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
        return false;
    }
    }

    public function create(){
        $querry = 'INSERT INTO ' . $this->table . '
        SET
            NotificationSender = :NotificationSender,
            NotificationContext = :NotificationContext,
            NotificationStatus = :NotificationStatus,
            NotificationDate = :NotificationDate,
            UserId = :UserId
    ';
    
    $stmt = $this->connection->prepare($querry);
    
    // Clean data
    $this->NotificationSender = htmlspecialchars(strip_tags($this->NotificationSender));
    $this->NotificationContext = htmlspecialchars(strip_tags($this->NotificationContext));
    $this->NotificationStatus = htmlspecialchars(strip_tags($this->NotificationStatus));
    $this->NotificationDate = htmlspecialchars(strip_tags($this->NotificationDate));
    $this->UserId = htmlspecialchars(strip_tags($this->UserId));


// Convertir la date au format MySQL (YYYY-MM-DD)
$this->NotificationDate = date('Y-m-d', strtotime($this->NotificationDate));
    
    // bind data
    $stmt->bindParam(":NotificationSender", $this->NotificationSender);
    $stmt->bindParam(":NotificationContext", $this->NotificationContext);
    $stmt->bindParam(":NotificationStatus", $this->NotificationStatus);
    $stmt->bindParam(":NotificationDate", $this->NotificationDate);
    $stmt->bindParam(":UserId", $this->UserId);
    
    // requete
    $stmt->execute();
    
    return $stmt;
    
    }
}

?>