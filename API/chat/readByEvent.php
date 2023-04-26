<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Chat.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Chat object
    $Chat = new Chat($db);

    // put payload info to chat
    $Chat->EventId = $payload->EventId;

    $Chat->readByEvent();

    $Chat_arr = array(
        'ChatId' => $Chat->ChatId,
        'EventId' => $Chat->EventId
    );

    print_r(json_encode($Chat_arr));

    


?>