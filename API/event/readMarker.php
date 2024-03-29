<?php
    // Headers
    header('Access-Control-Allow-Origin: *.example.com');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/event.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation event object
    $event = new Event($db);

    // event querry
    $result = $event->readMarker();
    // get row count
    $num = $result->rowCount();

    // check if any events
    if($num > 0)
    {
        $events_arr = array();
        $events_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $event_item = array(
                'Id' => $EventId,
                'Name' => $EventName,
                'Location' => $EventLocation
            );

            // push to 'data'
            array_push($events_arr['data'], $event_item);
        }

        // To json
        echo json_encode($events_arr);
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Image found')
        );
    }


?>