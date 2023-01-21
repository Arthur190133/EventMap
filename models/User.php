<?php

class User{
    // Database
    private $connection;
    private $table = 'user';

    // propriétés de l'utilisateur
    public $UserId;
    public $UserFirstName;
    public $UserName;
    public $UserEmail;
    public $UserPassword;
    public $UserDescription;
    public $UserAvatarId;
    public $UserAvatarName;
    public $UserAvatarDir;
    public $UserBackgroundId;
    public $UserBackgroundName;
    public $UserBackgroundDir;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer tous les utilisateurs
    public function readAll(){
        // Créer la requete

        $querry = 'SELECT
            u.UserId,
            u.UserFirstName,
            u.UserName,
            u.UserEmail,
            u.UserPassword,
            u.UserDescription,
            a.ImageName as UserAvatarName,
            a.ImageDir as UserAvatarDir,
            b.ImageName as UserBackgroundName,
            b.ImageDir as UserBackgroundDir
            FROM '. $this->table .' u
            LEFT JOIN image a ON u.UserAvatarId = a.ImageId
            LEFT JOIN image b ON u.UserBackgroundId = b.ImageId'
            ;

        $stmt = $this->connection->prepare($querry);

        $stmt->execute();

        return $stmt;
    }

    // récuperer 1 seul utilisateur

    public function readSingle()
    {
        // Créer la requete

        $querry = 'SELECT
            u.UserId,
            u.UserFirstName,
            u.UserName,
            u.UserEmail,
            u.UserPassword,
            u.UserDescription,
            a.ImageName as UserAvatarName,
            a.ImageDir as UserAvatarDir,
            b.ImageName as UserBackgroundName,
            b.ImageDir as UserBackgroundDir
            FROM '. $this->table .' u
            LEFT JOIN image a ON u.UserAvatarId = a.ImageId
            LEFT JOIN image b ON u.UserBackgroundId = b.ImageId
            WHERE
                UserId = ?
            LIMIT 0,1
        ';

        $stmt = $this->connection->prepare($querry);

        $stmt->bindParam(1, $this->UserId);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->UserFirstName = $row['UserFirstName'];
        $this->UserName = $row['UserName'];
        $this->UserEmail = $row['UserEmail'];
        $this->UserDescription = $row['UserDescription'];
        $this->UserPassword= $row['UserPassword'];
        $this->UserAvatarName= $row['UserAvatarName'];
        $this->UserAvatarDir= $row['UserAvatarDir'];
        $this->UserBackgroundName= $row['UserBackgroundName'];
        $this->UserBackgroundDir= $row['UserBackgroundDir'];

        return $stmt;
    }

    // Créer un utilisateur

    public function create(){

        $querry = 'INSERT INTO ' . $this->table . '
            SET
                UserFirstName = :FirstName,
                UserName = :Name,
                UserEmail = :Email,
                UserPassword = :Password,
                UserDescription = :Description,
                UserAvatarId = :AvatarId,
                UserBackgroundId = :BackgroundId
                
        ';
        // UserAvatarId = :AvatarId,
        // UserBackgroundId = :BackgroundId
        $stmt = $this->connection->prepare($querry);

        // Clean data
        $this->UserFirstName = htmlspecialchars(strip_tags($this->UserFirstName));
        $this->UserName = htmlspecialchars(strip_tags($this->UserName));
        $this->UserEmail = htmlspecialchars(strip_tags($this->UserEmail));
        $this->UserPassword = htmlspecialchars(strip_tags($this->UserPassword));
        $this->UserDescription = htmlspecialchars(strip_tags($this->UserDescription));
        $this->UserAvatarId = htmlspecialchars(strip_tags($this->UserAvatarId));
        $this->UserBackgroundId = htmlspecialchars(strip_tags($this->UserBackgroundId));

        //bind data
        $stmt->bindParam(':FirstName', $this->UserFirstName);
        $stmt->bindParam(':Name', $this->UserName);
        $stmt->bindParam(':Email', $this->UserEmail);
        $stmt->bindParam(':Password', password_hash($this->UserPassword, PASSWORD_DEFAULT));
        $stmt->bindParam(':Description', $this->UserDescription);
        $stmt->bindParam(':AvatarId', $this->UserAvatarId);
        $stmt->bindParam(':BackgroundId', $this->UserBackgroundId);

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

    // Connexion
    public function login()
    {
        $querry = "
        SELECT 
            * 
        FROM " . $this->table . " 
        WHERE 
            UserEmail like :Email ";

        $stmt = $this->connection->prepare($querry);

        $this->UserEmail = htmlspecialchars(strip_tags($this->UserEmail));
        //$this->UserPassword = htmlspecialchars(strip_tags($this->UserPassword));

        $stmt->bindParam(':Email', $this->UserEmail);

        // requete
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row > 0 && password_verify($this->UserPassword, $row['UserPassword']))
        {
            $this->UserId = $row['UserId'];
            $this->UserFirstName = $row['UserFirstName'];
            $this->UserName = $row['UserName'];
            $this->UserEmail = $row['UserEmail'];
            $this->UserDescription = $row['UserDescription'];
            //$this->UserPassword= $row['UserPassword'];
            $this->UserAvatarId= $row['UserAvatarId'];
            $this->UserBackgroundId= $row['UserBackgroundId'];

            return $this;
        }
        else{
            return false;
        }  
    }

    // mettre à jour l'utilisateur
    public function update(){

        $querry = 'UPDATE ' . $this->table . '
            SET
                UserFirstName = :FirstName,
                UserName = :Name,
                UserEmail = :Email,
                UserPassword = :Password,
                UserDescription = :Description,
                UserAvatarId = :AvatarId,
                UserBackgroundId = :BackgroundId
            WHERE
                UserId = :Id';
        $stmt = $this->connection->prepare($querry);

        // Clean data
        $this->UserId = htmlspecialchars(strip_tags($this->UserId));
        $this->UserFirstName = htmlspecialchars(strip_tags($this->UserFirstName));
        $this->UserName = htmlspecialchars(strip_tags($this->UserName));
        $this->UserEmail = htmlspecialchars(strip_tags($this->UserEmail));
        $this->UserPassword = htmlspecialchars(strip_tags($this->UserPassword));
        $this->UserDescription = htmlspecialchars(strip_tags($this->UserDescription));
        $this->UserAvatarId = htmlspecialchars(strip_tags($this->UserAvatarId));
        $this->UserBackgroundId = htmlspecialchars(strip_tags($this->UserBackgroundId));

        //bind data
        $stmt->bindParam(':FirstName', $this->UserFirstName);
        $stmt->bindParam(':Name', $this->UserName);
        $stmt->bindParam(':Email', $this->UserEmail);
        $stmt->bindParam(':Password', $this->UserPassword);
        $stmt->bindParam(':Description', $this->UserDescription);
        $stmt->bindParam(':AvatarId', $this->UserAvatarId);
        $stmt->bindParam(':BackgroundId', $this->UserBackgroundId);
        $stmt->bindParam('Id', $this->UserId);

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

    // Supprimer utilisateur
    public function delete(){
        // Create querry
        $querry = 'DELETE FROM ' . $this->table . ' WHERE UserId = :Id';

        // Prepare query
        $stmt = $this->connection->prepare($querry);

        // Clean data
        $this->UserId = htmlspecialchars(strip_tags($this->UserId));

        // Bind Id
        $stmt->bindParam('Id', $this->UserId);


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

}

?>