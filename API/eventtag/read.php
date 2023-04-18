<?php
    // Headers
    header('Access-Control-Allow-Origin: *.example.com');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/EventTag.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation event object
    $EventTag = new EventTag($db);

    // event querry
    $result = $EventTag->readAll();
    // get row count
    $num = $result->rowCount();

    // check if any EventTag
    if($num > 0)
    {
        $EventTag_arr = array();
        $EventTag_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $event_item = array(
                'EventId' => $EventId,
                'EventTagName' => $EventTagName
            );

            // push to 'data'
            array_push($EventTag_arr['data'], $event_item);
        }

        // To json
        echo json_encode($EventTag_arr);
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No EventTag found')
        );
    }


?>