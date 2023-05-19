<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/EventTag.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class EventTag
    $EventTag = new EventTag($db);

    // Modifier les informations de l'EventTag par celles voulues
    $EventTag->EventId = $payload->EventId;
    $EventTag->EventTagName = $payload->EventTagName;

    // Créer l'EventTag
    if($EventTag->create()){
        echo json_encode(
            array('message' => 'Tag created')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Tag not Created')
        );
    }
?>