<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Event.php';
    $payload = json_decode(include_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Event object
    $Event = new Event($db);

    $Event->OwnerId = isset($payload->OwnerId) ? $payload->OwnerId : die();

    // Event querry
    $result = $Event->readCreatedByUser();
    // get row count
    $num = $result->rowCount();

    // check if any Events
    if($num > 0)
    {
        $Events_arr = array();
        $Events_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $Event_item = array(
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
            array_push($Events_arr['data'], $Event_item);
        }

        // To json
        echo json_encode($Events_arr);
    }


?>