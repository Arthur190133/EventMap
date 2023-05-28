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
    $UserWarned = new Event($db);

    // Modifier les informations de l'event par celles voulues
    $UserWarned->UserId = $payload->UserId;
    $UserWarned->UserWarnedStartDate = $payload->UserWarnedStartDate;
    $UserWarned->UserWarnedEndDate = $payload->UserWarnedEndDate;
    $UserWarned->UserWarnedContext = $payload->UserWarnedContext;

    // Créer l'event
    if($UserWarned->create()){
        echo json_encode(
            array("Id" => $db->lastInsertId())
        );
    }
    else{
        echo json_encode(
            array('message' => 'warn not Created')
        );
    }
?>