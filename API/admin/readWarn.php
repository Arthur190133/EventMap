<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Admin.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Admin object
    $Warn = new Warn($db);

    // Admin querry
    $result = $Warn->readAll();
    // get row count
    $num = $result->rowCount();
    // check if any Chats
    if($num > 0)
    {
        $Warn_arr = array();
        $Warn_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $Warn_item = array(
                'UserWarnedContext' => $UserWarnedContext,
                'UserWarnedStartDate' => $UserWarnedEndDate,
                'WarnEndDate' => $WarnEndDate,
                'UserId' => $UserId,
                'SuperAdminId' => $SuperAdminId,
            );
            // push to 'data'
            array_push($Warn_arr['data'], $Warn_item);
        }

        // To json
        echo json_encode($Warn_arr);
        
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Warn found')
        );
    }


?>