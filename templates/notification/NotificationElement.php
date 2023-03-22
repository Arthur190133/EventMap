<?php
    if(!$Connected){
        require_once '../components/notification/notConnectedNotification.php';
    }
    elseif(property_exists($Notifications, "message")) 
    {
        /*switch($Notifications->code){
            case 0001:
                echo "Vous n'avez pas l'accès à vos notifications";
                break;
            case 0002: case 0003: case 0005:
                echo "Une erreur c'est produite lors de la récupération de vos notifications";
                break;
            case 0004: 
                echo "La clé d'authotantification a expirée";
                break;
        }*/
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
            require '../components/notification/NotificationElement.php';
        }
    }
?>