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
    $Admin = new Admin($db);

    // Admin querry
    $result = $Admin->readAll();
    // get row count
    $num = $result->rowCount();
    // check if any Chats
    if($num > 0)
    {
        $Admins_arr = array();
        $Admins_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $Admin_item = array(
                'Id' => $AdminId,
                'StartDate' => $AdminStartDate,
                'EndDate' => $AdminEndDate,
                'UserId' => $UserId
            );
            // push to 'data'
            array_push($Admins_arr['data'], $Admin_item);
        }

        // To json
        echo json_encode($Admins_arr);
        
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Admin found')
        );
    }


?>