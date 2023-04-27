<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/ChatMessage.php';
   // $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation ChatMessage object
    $ChatMessage = new ChatMessage($db);

    // put payload info to ChatMessage
    //$ChatMessage->ChatMessageId = $payload->ChatMessageId;
    $ChatMessage->ChatId = 1;

    $ChatMessage->readByChat();

    $ChatMessage_arr = array(
        'Id' => $ChatMessage->ChatId,
        'Messages' => $ChatMessage->Messages,
        'UserId' => $ChatMessage->UserId,
        'UserFirstName' => $ChatMessage->UserFirstName,
        'UserName' => $ChatMessage->UserName,
        'UserAvatarId' => $ChatMessage->UserAvatarId,
        'UserAvatarDir' => $ChatMessage->UserAvatarDir,
        'UserAvatarName' => $ChatMessage->UserAvatarName
    );

    print_r(json_encode($ChatMessage_arr));

    


?>