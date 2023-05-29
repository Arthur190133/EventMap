<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/UserWarned.php';
    $payload = json_decode(require_once '../auth.php');
    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Warn object
    $UserWarned = new UserWarned($db);

    // Admin querry
    $result = $UserWarned->readWarn();
    // get row count
    $num = $result->rowCount();

    if($num > 0)
    {
        $UserWarned_arr = array();
        $UserWarned_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $UserWarned_item = array(
                'UserWarnedContext' => $UserWarnedContext,
                'UserWarnedStartDate' => $UserWarnedStartDate,
                'UserWarnedEndDate' => $UserWarnedEndDate,
                'UserId' => $UserId,
                'SuperAdminId' => $SuperAdminId,
            );
            // push to 'data'
            array_push($UserWarned_arr['data'], $UserWarned_item);
        }

        // To json
        echo json_encode($UserWarned_arr);
        
    }
    else
    {
        // pas de warn
        echo json_encode(
            array('message' => 'No Warn found')
        );
    }


?>