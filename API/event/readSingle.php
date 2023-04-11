<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Event.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation event object
    $event = new Event($db);

    // Get Id
    $event->EventId = isset($_GET['EventId']) ? $_GET['EventId'] : die();

    $event->readSingle();

    if($event->EventId != "")
    {
        $event_arr = array(
            'Id' => $event->EventId,
            'BackgroundName' => $event->EventBackgroundName,
            'BackgroundDir' => $event->EventBackgroundDir,
            'ThumbnailName' => $event->EventThumbnailName,
            'ThumbnailDir' => $event->EventThumbnailDir,
            'OwnerName' => $event->OwnerName,
            'OwnerEmail' => $event->OwnerEmail,
            'OwnerAvatarName' => $event->OwnerAvatarName,
            'OwnerAvatarDir' => $event->OwnerAvatarDir,
            'OwnerBackgroundName' => $event->OwnerBackgroundName,
            'OwnerBackgroundDir' => $event->OwnerBackgroundDir,
            'Name' => $event->EventName,
            'Description' => $event->EventDescription,
            'StartDate' => $event->EventStartDate,
            'EndDate' => $event->EventEndDate,
            'Location' => $event->EventLocation,
            'Category' => $event->EventCategory,
            'Private' => $event->EventPrivate,
            'Size' => $event->EventSize,
            'Price' => $event->EventPrice,
            'CardColor' => $event->EventCardColor,
            'PageColor' => $event->EventPageColor
        );
    
        print_r(json_encode($event_arr));
    }

    


?>