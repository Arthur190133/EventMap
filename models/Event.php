<?php

class Event{
    // Database
    private $connection;
    private $table = 'event';

    // propriété de l'évenement 
    public $EventId;
    public $EventBackgroundId;
    public $EventBackgroundName;
    public $EventBackgroundDir;
    public $EventThumbnailId;
    public $EventThumbnailName;
    public $EventThumbnailDir;
    public $EventOwnerId;
    public $OwnerName;
    public $OwnerEmail;
    public $OwnerDescription;
    public $OwnerAvatarName;
    public $OwnerAvatarDir;
    public $OwnerBackgroundName;
    public $OwnerBackgroundDir;
    public $EventName;
    public $EventDescription;
    public $EventStartDate;
    public $EventEndDate;
    public $EventLocation;
    public $EventCategory;
    public $EventPrivate;
    public $EventSize;
    public $EventPrice;
    public $EventCardColor;
    public $EventPageColor;

    // constructeur
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // récuperer tous les évenements
    public function readAll()
    {
        // Créer la requete
        $querry = '
        SELECT
            event.EventId,
            EventBackground.ImageName as EventBackgroundName,
            EventBackground.ImageDir as EventBackgroundDir,
            EventThumbnail.ImageName as EventThumbnailName,
            EventThumbnail.ImageDir as EventThumbnailDir,
            user.UserName as OwnerName,
            user.UserEmail as OwnerEmail,
            user.UserDescription as OwnerDescription,
            UserAvatar.ImageName as OwnerAvatarName,
            UserAvatar.ImageDir as OwnerAvatarDir,
            UserBackground.ImageName as OwnerBackgroundName,
            UserBackground.ImageDir as OwnerBackgroundDir,
            event.EventName,
            event.EventDescription,
            event.EventStartDate,
            event.EventEndDate,
            event.EventLocation,
            event.EventCategory,
            event.EventPrivate,
            event.EventSize,
            event.EventPrice,
            event.EventCardColor,
            event.EventPageColor
        FROM '
            . $this->table . ' event
            LEFT JOIN 
                user user ON event.EventOwnerId = user.UserId
            LEFT JOIN 
                image EventBackground ON event.EventBackgroundId = EventBackground.ImageId
            LEFT JOIN 
                image EventThumbnail ON event.EventThumbnailId = EventThumbnail.ImageId
            LEFT JOIN
                image UserAvatar ON user.UserAvatarId = UserAvatar.ImageId
            LEFT JOIN
                image UserBackground ON user.UserBackgroundId = UserBackground.ImageId
                
            ';

        $stmt = $this->connection->prepare($querry);

        $stmt->execute();

        return $stmt;
    }

    // récuperer 1 seul évenement

    public function readSingle(){
               // Créer la requete
               $querry = '
               SELECT
                   event.EventId,
                   EventBackground.ImageName as EventBackgroundName,
                   EventBackground.ImageDir as EventBackgroundDir,
                   EventThumbnail.ImageName as EventThumbnailName,
                   EventThumbnail.ImageDir as EventThumbnailDir,
                   user.UserName as OwnerName,
                   user.UserEmail as OwnerEmail,
                   user.UserDescription as OwnerDescription,
                   UserAvatar.ImageName as OwnerAvatarName,
                   UserAvatar.ImageDir as OwnerAvatarDir,
                   UserBackground.ImageName as OwnerBackgroundName,
                   UserBackground.ImageDir as OwnerBackgroundDir,
                   event.EventName,
                   event.EventDescription,
                   event.EventStartDate,
                   event.EventEndDate,
                   event.EventLocation,
                   event.EventCategory,
                   event.EventPrivate,
                   event.EventSize,
                   event.EventPrice,
                   event.EventCardColor,
                   event.EventPageColor
               FROM '
                   . $this->table . ' event
                   LEFT JOIN 
                       user user ON event.EventOwnerId = user.UserId
                   LEFT JOIN 
                       image EventBackground ON event.EventBackgroundId = EventBackground.ImageId
                   LEFT JOIN 
                       image EventThumbnail ON event.EventThumbnailId = EventThumbnail.ImageId
                   LEFT JOIN
                       image UserAvatar ON user.UserAvatarId = UserAvatar.ImageId
                   LEFT JOIN
                       image UserBackground ON user.UserBackgroundId = UserBackground.ImageId
                WHERE
                    EventId = ?
                LIMIT 0,1
                   ';

        $stmt = $this->connection->prepare($querry);

        $stmt->bindParam(1, $this->EventId);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->EventBackgroundName = $row['EventBackgroundName'];
        $this->EventBackgroundDir = $row['EventBackgroundDir'];
        $this->EventThumbnailName = $row['EventThumbnailName'];
        $this->EventThumbnailDir = $row['EventThumbnailDir'];
        $this->OwnerName = $row['OwnerName'];
        $this->OwnerEmail = $row['OwnerEmail'];
        $this->OwnerDescription = $row['OwnerDescription'];
        $this->OwnerAvatarName = $row['OwnerAvatarName'];
        $this->OwnerAvatarDir = $row['OwnerAvatarDir'];
        $this->OwnerBackgroundName = $row['OwnerBackgroundName'];
        $this->OwnerBackgroundDir = $row['OwnerBackgroundDir'];
        $this->EventName = $row['EventName'];
        $this->EventDescription = $row['EventDescription'];
        $this->EventStartDate = $row['EventStartDate'];
        $this->EventEndDate = $row['EventEndDate'];
        $this->EventLocation = $row['EventLocation'];
        $this->EventCategory = $row['EventCategory'];
        $this->EventPrivate = $row['EventPrivate'];
        $this->EventSize = $row['EventSize'];
        $this->EventPrice = $row['EventPrice'];
        $this->EventCardColor = $row['EventCardColor'];
        $this->EventPageColor = $row['EventPageColor'];

        return $stmt;

    }

    // Créer un évenement

    public function create()
    {
        $querry = "INSERT INTO " . $this->table . '
            SET
                EventBackgroundId = :BackgroundId,
                EventThumbnailId = :ThumbnailId,
                EventOwnerId = :OwnerId,
                EventName = :Name,
                EventDescription = :Description,
                EventStartDate = :StartDate,
                EventEndDate = :EndDate,
                EventLocation = :Location,
                EventCategory = :Category,
                EventPrivate = :Private,
                EventSize = :Size,
                EventPrice = :Price,
                EventCardColor = :CardColor,
                EventPageColor = :PageColor
        ';

        $stmt = $this->connection->prepare($querry);

        $this->EventBackgroundId = htmlspecialchars(strip_tags($this->EventBackgroundId));
        $this->EventThumbnailId = htmlspecialchars(strip_tags($this->EventThumbnailId));
        $this->EventOwnerId = htmlspecialchars(strip_tags($this->EventOwnerId));
        $this->EventName = htmlspecialchars(strip_tags($this->EventName));
        $this->EventDescription = htmlspecialchars(strip_tags($this->EventDescription));
        $this->EventStartDate = htmlspecialchars(strip_tags($this->EventStartDate));
        $this->EventEndDate = htmlspecialchars(strip_tags($this->EventEndDate));
        $this->EventLocation = htmlspecialchars(strip_tags($this->EventLocation));
        $this->EventCategory = htmlspecialchars(strip_tags($this->EventCategory));
        $this->EventPrivate = htmlspecialchars(strip_tags($this->EventPrivate));
        $this->EventSize = htmlspecialchars(strip_tags($this->EventSize));
        $this->EventPrice = htmlspecialchars(strip_tags($this->EventPrice));
        $this->EventCardColor = htmlspecialchars(strip_tags($this->EventCardColor));
        $this->EventPageColor = htmlspecialchars(strip_tags($this->EventPageColor));

        $stmt->bindParam(':BackgroundId', $this->EventBackgroundId);
        $stmt->bindParam(':ThumbnailId', $this->EventThumbnailId);
        $stmt->bindParam(':OwnerId', $this->EventOwnerId);
        $stmt->bindParam(':Name', $this->EventName);
        $stmt->bindParam(':Description', $this->EventDescription);
        $stmt->bindParam(':StartDate', $this->EventStartDate);
        $stmt->bindParam(':EndDate', $this->EventEndDate);
        $stmt->bindParam(':Location', $this->EventLocation);
        $stmt->bindParam(':Category', $this->EventCategory);
        $stmt->bindParam(':Private', $this->EventPrivate);
        $stmt->bindParam(':Size', $this->EventSize);
        $stmt->bindParam(':Price', $this->EventPrice);
        $stmt->bindParam(':CardColor', $this->EventCardColor);
        $stmt->bindParam(':PageColor', $this->EventPageColor);
        // requete
        if($stmt->execute())
        {
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