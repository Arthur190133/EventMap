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

    // Chat querry
    $result = $Chat->readAll();
    // get row count
    $num = $result->rowCount();
    // check if any Chats
    if($num > 0)
    {
        $Chats_arr = array();
        $Chats_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $Chat_item = array(
                'Id' => $ChatId,
                'EventId' => $EventId,
                'Messages' => $Messages
            );
            // push to 'data'
            array_push($Chats_arr['data'], $Chat_item);
        }

        // To json
        echo json_encode($Chats_arr);
        
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Chat found')
        );
    }


?>