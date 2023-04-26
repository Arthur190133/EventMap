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
    $Chat->ChatId = $payload->ChatId;
    $Chat->readByChat();

    $Chat_arr = array(
        'Id' => $Chat->ChatId,
        'Messages' => $Chat->Messages,
        'UserId' => $Chat->UserId,
        'UserFirstName' => $Chat->UserFirstName,
        'UserName' => $Chat->UserName,
        'UserAvatarId' => $Chat->UserAvatarId,
        'UserAvatarDir' => $Chat->UserAvatarDir,
        'UserAvatarName' => $Chat->UserAvatarName
    );

    print_r(json_encode($Chat_arr));

    


?>