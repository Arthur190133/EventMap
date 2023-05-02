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
}

?>