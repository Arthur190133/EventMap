<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Notification.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Notification object
    $Notification = new Notification($db);

    // Get Id
    $Notification->NotificationId = $payload->NotificationId;

    if($Notification->updateStatus()){
        echo json_encode(
            array('message' => 'Notification Updated')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Error => Notification not Updated')
        );
    }



    

    


?>