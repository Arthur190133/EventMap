<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Notification.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Notification object
    $Notification = new Notification($db);

    // Get Id
    $Notification->NotificationId = isset($_GET['NotificationId']) ? $_GET['NotificationId'] : die();

    $Notification->readSingle();

    $Notification_arr = array(
        'Id' => $Notification->NotificationId,
        'Sender' => $Notification->NotificationSender,
        'Context' => $Notification->NotificationContext,
        'Status' => ($Notification->NotificationStatus) ? 'already read' : 'not read yet',
        'Date' => $Notification->NotificationDate,
        'UserId' => $Notification->UserId,
    );

    print_r(json_encode($Notification_arr));

    

    


?>