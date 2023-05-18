<?php
    // Headers
    header('Access-Control-Allow-Origin: *.example.com');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/event.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation event object
    $Event = new Event($db);

    // inputs
    $data = json_decode(file_get_contents('php://input'));

    $Event->EventName = isset($data->EventName)  ?  $data->EventName : "";


    // event querry
    $result = $Event->Navbar();

    $events_arr = array();
    $events_arr['data'] = $result; // Utilisez directement le résultat obtenu
    
    // Renvoyer la réponse JSON
    header('Content-Type: application/json');
    echo json_encode($events_arr);


?>