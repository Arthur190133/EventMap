<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Chat.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Chat object
    $Chat = new Chat($db);

    // Get Id
    $Chat->ChatId = isset($_GET['ChatId']) ? $_GET['ChatId'] : die();

    $Chat->readSingle();

    $Chat_arr = array(
        'Id' => $Chat->ChatId,
        'EventId' => $Chat->EventId,
        'Messages' => $Chat->Messages
    );

    print_r(json_encode($Chat_arr));

    


?>