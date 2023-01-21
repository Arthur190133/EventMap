<?php
/* User

        !!UserName vous à invitez à rejoindre un évènement.     --> Lien vers une page d'invitation

   Event
    
        !!UserName à rejoind votre évènement(EventName).                                             --> Lien vers l'évènement 
        !!Votre évènement va bientôt commencer (EventName).  15 minutes avant le commencenment       --> Lien vers l'évènement 
        !!Votre évènement commence (EventName).                                                      --> Lien vers l'évènement 
        !!Votre évènement va bientôt se terminer (EventName). 15 Minutes avant la fin.               --> Lien vers l'évènement 
        !!Votre évènement est terminer (EventName), vous avez désormais acces à sa vue d'ensemble.   --> Lien vers l'évènement 
        !!EventName à été dissous.                                                                   --> Lien vers la page des évènements
        !!Vous avez été exclu de (EventName).

*/



$Connected = $user;



function GetNotificationSender($NotificationSender){
    $Sender = "Unkown";
    if(strpos($NotificationSender, "User") !== false){
        $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . substr($NotificationSender, strpos(($NotificationSender), "=") + 1);
        $RequestSender = json_decode(file_get_contents($url));
        $Sender = array(
            'SenderName' => $RequestSender->UserName . " " . $RequestSender->UserFirstName,
            'SenderImage' => $RequestSender->UserAvatarDir
        );
    }
    elseif(strpos($NotificationSender, "Event") !== false){
        $url = "http://localhost/EventMap/API/event/readSingle.php?EventId=" . substr($NotificationSender, strpos(($NotificationSender), "=") + 1);
        $RequestSender = json_decode(file_get_contents($url));
        //print_r($RequestSender);
        $Sender = array(
            'SenderName' => $RequestSender->Name,
            'SenderImage' => $RequestSender->ThumbnailDir
        );
    
    }

    return $Sender;
}

function GetNotificationContext($NotificationContext):string{
    $Context = $NotificationContext;
    if(strpos($NotificationContext, "EventId") !== false){
        $s =  GetStringBetweenTwoCharacters($NotificationContext, "{", "}");
        $Event = GetEvent(substr($s, strpos(($s), "=") + 1));
        $Context = str_replace($s, $Event->EventName, $NotificationContext);
        $Context = str_replace("{", "", $Context);
        $Context = str_replace("}", "", $Context);
    }
    return $Context;
}

function GetNotificationDate($NotificationDate):string{
    $Date = $NotificationDate;

    $now = new DateTime;
    $ago = new DateTime($NotificationDate);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'année',
        'm' => 'mois',
        'w' => 'semaine',
        'd' => 'jour',
        'h' => 'heure',
        'i' => 'minute',
        's' => 'seconde',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    $Date = $string ? ' il y a ' . implode(', ', $string) : 'il y a quelques instant';

    return $Date;
}

function GetStringBetweenTwoCharacters($string, $start, $end){
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);

}


if($Connected)
{
    // REQUEST TO GET ALL NOTIFICATIONS 
    $url = "http://localhost/EventMap/API/notification/readUser.php";

    $data = array($user);
    $json_data = json_encode($data);
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $Notifications = curl_exec($ch);

    curl_close($ch);
    $Notifications =  json_decode($Notifications);
    

    if(!property_exists($Notifications, "message")){
        $Notifications = $Notifications->data;
        $NotificationsNumber = count($Notifications);
    }

}
else
{
    //not connected
}

    require_once 'components/Notification.php';
?>
