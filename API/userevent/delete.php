<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/UserEvent.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class UserEvent
    $UserEvent = new UserEvent($db);


    // Set Id to update
    $UserEvent->UserId = $payload->UserId;
    $UserEvent->EventId = $payload->EventId;

    // mettre à jour l'utilisateur
    if($UserEvent->delete()){
        echo json_encode(
            array('message' => 'succed')
        );
    }
    else{
        echo json_encode(
            array('message' => 'failed')
        );
    }



?>