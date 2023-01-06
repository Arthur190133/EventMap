<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/Event.php';

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class event
    $event = new Event($db);

    // Recuperer les informations de l'event
    $data = json_decode(file_get_contents("php://input"));

    // Modifier les informations de l'event par celles voulues
    $event->EventName = $data->EventName;
    $event->EventBackgroundId = $data->EventBackgroundId;
    $event->EventThumbnailId = $data->EventThumbnailId;
    $event->EventOwnerId = $data->EventOwnerId;
    $event->EventName = $data->EventName;
    $event->EventDescription = $data->EventDescription;
    $event->EventStartDate = $data->EventStartDate;
    $event->EventEndDate = $data->EventEndDate;
    $event->EventLocation = $data->EventLocation;
    $event->EventCategory = $data->EventCategory;
    $event->EventPrivate = $data->EventPrivate;
    $event->EventSize = $data->EventSize;
    $event->EventPrice = $data->EventPrice;
    $event->EventCardColor = $data->EventCardColor;
    $event->EventPageColor = $data->EventPageColor;



    // Créer l'event
    if($event->create()){
        echo json_encode(
            array('message' => 'event Created')
        );
    }
    else{
        echo json_encode(
            array('message' => 'event not Created')
        );
    }
?>