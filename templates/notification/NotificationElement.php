<?php

    if(!$Connected){
        require_once 'components/notification/notConnectedNotification.php';
    }
    elseif($Notifications->message)
    {
        require_once 'components/notification/NoNotificationFound.php';
    }
    else
    {
        foreach($Notifications as $value => $Notification)
        {            
            
            $Sender = GetNotificationSender($Notification->Sender);
            $Context = GetNotificationContext($Notification->Context);
            $Date = GetNotificationDate($Notification->Date);
            require 'components/NotificationElement.php';
        }
    }
        
?>