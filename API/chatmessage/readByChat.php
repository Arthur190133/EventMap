<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/ChatMessage.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation ChatMessage object
    $ChatMessage = new ChatMessage($db);

    // put payload info to ChatMessage
    $ChatMessage->ChatId = $payload->ChatId;

    $ChatMessages = $ChatMessage->readByChat();

    $num = $ChatMessages->rowCount();

    

    if($num > 0){
        $chatMessages_arr = array();
        $chatMessages_arr['data'] = array();

        while($row = $ChatMessages->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $chatMessages_item = array(
                'ChatMessageId' => $ChatMessage->ChatMessageId,
                'Message' => $ChatMessage->ChatMessageText,
                'UserId' => $ChatMessage->UserId,
                'UserFirstName' => $ChatMessage->UserFirstName,
                'UserName' => $ChatMessage->UserName,
                'UserAvatarId' => $ChatMessage->UserAvatarId,
                'UserAvatarDir' => $ChatMessage->UserAvatarDir,
                'UserAvatarName' => $ChatMessage->UserAvatarName,
            );

            array_push($chatMessages_arr['data'], $chatMessages_item);
        }
        echo json_encode($chatMessages_arr);
    }
    else{

        echo json_encode(
            array('message' => 'No chat message found ')
        );
    
    }
?>