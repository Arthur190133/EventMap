<?php

class UserEvent{
    private $connection;
    private $table = "UserEvent";

    // propriété UserEvent
    public $EventId;
    public $EventName;
    public $UserId;
    public $EventLocation;
    public $EventStartDate;
    public $EventEndDate;
    public $EventPrice;
    public $EventTumbnailDir;
    public $EventThumbnailName;

    /*         event.EventLocation,
            event.EventStartDate,
            event.EventEndDate,
            event.EventPrice */
    
    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer tous les UserEvent
    public function readAll()
    {
        $query = '
        SELECT 
        UserId,
        EventId
        FROM ' . $this->table;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();
        
        return $stmt;
    }

    public function readSingle()
    {

    }

    public function readUserJoined()
    {
        $query = '
        SELECT 
            userevent.UserId,
            userevent.EventId,
            event.EventName,
            event.EventLocation,
            event.EventStartDate,
            event.EventEndDate,
            event.EventPrice,
            image.ImageDir as EventThumbnailDir,
            image.ImageName as EventThumbnailName
        FROM ' . $this->table . ' userevent
        LEFT JOIN 
            event event ON userevent.EventId = event.EventId
        LEFT JOIN
            image image ON event.EventThumbnailId = image.ImageId
        WHERE
            userevent.UserId = ?
        ';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->UserId);

        $stmt->execute();
        
        return $stmt;
    }
}

?>