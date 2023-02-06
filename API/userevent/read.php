<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/UserEvent.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation UserEvent object
    $UserEvent = new UserEvent($db);

    // UserEvent querry
    $result = $UserEvent->readAll();
    // get row count
    $num = $result->rowCount();

    // check if any UserEvents
    if($num > 0)
    {
        $UserEvents_arr = array();
        $UserEvents_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $UserEvent_item = array(
                'UserId' => $UserId,
                'EventId' => $EventId
            );

            // push to 'data'
            array_push($UserEvents_arr['data'], $UserEvent_item);
        }

        // To json
        echo json_encode($UserEvents_arr);
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No UserEvent found')
        );
    }


?>