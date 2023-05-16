<?php

class Image{
    private $connection;
    private $table = 'image';

    // propriété image
    public $ImageId;
    public $ImageName;
    public $ImageDir;

     // constructeur
     public function __construct($db)
     {
         $this->connection = $db;
     }

     // récuperer toutes les images
     public function readAll(){
        // requete
        $querry = '
        SELECT
            ImageId,
            ImageName,
            ImageDir
        FROM
        ' . $this->table ;

        $stmt = $this->connection->prepare($querry);

        $stmt->execute();
        
        return $stmt;
     }
     
     // récuperer une seule image
     public function readSingle()
     {
        // requete
        $querry = '
        SELECT
            ImageId,
            ImageName,
            ImageDir
        FROM 
        ' . $this->table . ' 
        WHERE
            ImageId = ? 
        LIMIT 0,1
        ';

        $stmt = $this->connection->prepare($querry);

        $stmt->bindParam(1, $this->ImageId);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->ImageName = $row['ImageName'];
        $this->ImageDir = $row['ImageDir'];

        return $stmt;
     }

     // Créer une image
     public function create(){
        $querry = 'INSERT INTO ' . $this->table . '
            SET
                ImageName = :name,
                ImageDir = :dir
        ';

        $stmt = $this->connection->prepare($querry);

        // Clean data
        $this->ImageName = htmlspecialchars(strip_tags($this->ImageName));
        $this->ImageDir = htmlspecialchars(strip_tags($this->ImageDir));

        // bind data
        $stmt->bindParam("name", $this->ImageName);
        $stmt->bindParam("dir", $this->ImageDir);

        // requete
        $stmt->execute();

        $this->ImageId = $this->connection->lastInsertId();
        
        return $stmt;
     }

     public function delete(){
        // Create querry
        $querry = 'DELETE FROM ' . $this->table . ' WHERE ImageId = :Id';

        // Prepare query
        $stmt = $this->connection->prepare($querry);

        // Clean data
        $this->ImageId = htmlspecialchars(strip_tags($this->ImageId));

        // Bind Id
        $stmt->bindParam(':Id', $this->ImageId);


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