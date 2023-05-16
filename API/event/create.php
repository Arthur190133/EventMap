<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/Event.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class event
    $event = new Event($db);

    // Modifier les informations de l'event par celles voulues
    $event->EventName = $payload->EventName;
    $event->EventBackgroundId = $payload->EventBackgroundId;
    $event->EventThumbnailId = $payload->EventThumbnailId;
    $event->OwnerId = $payload->EventOwnerId;
    $event->EventName = $payload->EventName;
    $event->EventDescription = $payload->EventDescription;
    $event->EventStartDate = $payload->EventStartDate;
    $event->EventEndDate = $payload->EventEndDate;
    $event->EventLocation = $payload->EventLocation;
    $event->EventCategory = $payload->EventCategory;
    $event->EventPrivate = $payload->EventPrivate;
    $event->EventSize = $payload->EventNumber;
    $event->EventPrice = $payload->EventPrice;
    $event->EventCardColor = $payload->EventCardColor;
    $event->EventPageColor = $payload->EventPageColor;



    // Créer l'event
    if($event->create()){
        echo json_encode(
            array("Id" => $event->EventId)
        );
    }
    else{
        echo json_encode(
            array('message' => 'event not Created')
        );
    }
?>