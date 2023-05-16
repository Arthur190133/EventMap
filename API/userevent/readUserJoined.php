<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/UserEvent.php';
    $payload = json_decode(include_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation UserEvent object
    $UserEvent = new UserEvent($db);

    $UserEvent->UserId = isset($payload->UserId) ? $payload->UserId : die();

    // UserEvent querry
    $result = $UserEvent->readUserJoined();
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
                'EventId' => $EventId,
                'Name' => $EventName,
                'Location' => $EventLocation,
                'StartDate' => $EventStartDate,
                'EndDate' => $EventEndDate,
                'Price' => $EventPrice,
                'ThumbnailDir' => $EventThumbnailDir,
                'ThumbnailName' => $EventThumbnailName
            );

            // push to 'data'
            array_push($UserEvents_arr['data'], $UserEvent_item);
        }

        // To json
        echo json_encode($UserEvents_arr);
    }


?>