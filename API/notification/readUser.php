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
    
            $Notification->UserId = $payload->userId;
            // Notification querry
            $result = $Notification->readUser();
            // get row count
            $num = $result->rowCount();
    
            // check if any Notifications
            if ($num > 0) {
                $Notifications_arr = array();
                $Notifications_arr['data'] = array();
    
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $Notification_item = array(
                        'Id' => $NotificationId,
                        'Sender' => $NotificationSender,
                        'Context' => $NotificationContext,
                        'Status' => ($NotificationStatus) ? 'already read' : 'not read yet',
                        'Date' => $NotificationDate,
                        'UserId' => $UserId,
                        'UserName' => $UserName,
                        'UserFirstName' => $UserFirstName,
                        'UserAvatarDir' => $UserAvatarDir,
                        'UserAvatarName' => $UserAvatarName
                    );
    
                    // push to 'data'
                    array_push($Notifications_arr['data'], $Notification_item);
                }
    
                // To json
                echo json_encode($Notifications_arr);
            }

    


?>