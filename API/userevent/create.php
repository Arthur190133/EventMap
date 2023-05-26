<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/UserEvent.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation UserEvent object
    $UserEvent = new UserEvent($db);


    $UserEvent->UserId = $payload->UserId;
    $UserEvent->EventId = $payload->EventId;

    // check if any UserEvents
    if($UserEvent->create())
    {
        echo json_encode(
            array('message' => "User has been added")
        );
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No UserEvent found')
        );
    }


?>