<?php
    if(!$Connected){
        require_once '../components/notification/notConnectedNotification.php';
    }
    elseif(property_exists($Notifications, "message")) 
    {
        require_once '../components/notification/NoNotificationFound.php';
    }
    else
    {
        $Notifications = $Notifications->data;
        foreach($Notifications as $value => $Notification)
        {            
            $Sender = GetNotificationSender($Notification->Sender);
            $Context = GetNotificationContext($Notification->Context);
            $Date = GetNotificationDate($Notification->Date);
            //$notificationLink = GetNotificationLink($Sender['SenderId'], $Notification->Sender, $Notification->Id);
            $notificationLink = "/notification?id=" . $Notification->Id . "&redirect=" . GetNotificationLink($Sender['SenderId'], $Notification->Sender, $Notification->Id);
            $_SESSION['notificationLink'] = $notificationLink;
            require '../components/notification/NotificationElement.php';
        }
    }
?>