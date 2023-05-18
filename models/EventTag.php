<?php

class EventTag{
    private $connection;
    private $table = 'eventtag';

    // propriété eventtag
    public $EventId;
    public $EventTagName;

     // constructeur
     public function __construct($db)
     {
         $this->connection = $db;
     }

    // récuperer toutes les eventtagsq
    public function readAll(){
    // requete
    $querry = '
    SELECT
        EventId,
        EventTagName
    FROM
    ' . $this->table ;

    $stmt = $this->connection->prepare($querry);

    $stmt->execute();
    
    return $stmt;
    }

    // récuperer par event
    public function readByEvent(){
            // requete
    $querry = '
    SELECT
        EventId,
        EventTagName
    FROM
    ' . $this->table . ' 
     WHERE
        EventId = :EventId
    ';

    $stmt = $this->connection->prepare($querry);
    
    $stmt->bindParam(':EventId', $this->EventId);

    $stmt->execute();
    
    return $stmt;
    }

    public function create(){
        $querry = 'INSERT INTO ' . $this->table . '
        SET
            EventId = :Id,
            EventTagName = :TagName
    ';

    $stmt = $this->connection->prepare($querry);

    // Clean data
    $this->EventId = htmlspecialchars(strip_tags($this->EventId));
    $this->EventTagName = htmlspecialchars(strip_tags($this->EventTagName));

    // bind data
    $stmt->bindParam(":Id", $this->EventId);
    $stmt->bindParam(":TagName", $this->EventTagName);

    // requete
    $stmt->execute();

    //$this->ImageId = $this->connection->lastInsertId();
    
    return $stmt;
    }
}

?>