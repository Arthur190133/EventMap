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


    $Notification->NotificationSender = $payload->NotificationSender;
    $Notification->NotificationContext = $payload->NotificationContext;
    $Notification->NotificationStatus = $payload->NotificationStatus;
    $Notification->NotificationDate = $payload->NotificationDate;
    $Notification->UserId = $payload->UserId;


    // check if any Notifications
    if($Notification->create())
    {
        echo json_encode(
            array('message' => "User has been added")
        );
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Notification found')
        );
    }


?>