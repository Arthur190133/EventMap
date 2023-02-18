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
        $Event = "";//GetEvent(substr($s, strpos(($s), "=") + 1));
        //$Context = str_replace($s, $Event->EventName, $NotificationContext);
        $Context = str_replace("{", "", $Context);
        $Context = str_replace("}", "", $Context);
    }
    return $Context;
}

function GetNotificationDate($NotificationDate):string{
    if($NotificationDate){
        $CurrentNotificationDate = new DateTime($NotificationDate);
        $currentDate = new DateTime();
        $diff = $currentDate->diff($CurrentNotificationDate);
        
        $timeUnits = array(
            "année" => $diff->y,
            "mois" => $diff->m,
            "jour" => $diff->d,
            "heure" => $diff->h,
            "minute" => $diff->i,
            "seconde" => $diff->s,
        );
        
        foreach ($timeUnits as $unit => $value) {
            if ($value == 0) {
                continue;
            }
            $date = "il y a " . $value . " " . $unit . ($value > 1 ? "s" : "");
            break;
        }
    
        return $date;
    }

    return "Impossible de récupérer la date";

}

function GetStringBetweenTwoCharacters($string, $start, $end){
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);

}

$NotificationsNumber = "";
if($Connected)
{
    // REQUEST TO GET ALL NOTIFICATIONS 
    $url = "http://localhost/EventMap/API/notification/readUser.php";

    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];

    $payload = [
        'userId' => $user->UserId,
    ];
    $jwt = new JWT();
    $token = $jwt->generate($header, $payload, 60 * 3);
    


    $data = array($user);
    $json_data = json_encode($data);
    $authorization_header = "Authorization: Bearer ".$token;
    $ch = curl_init();

    // Set cURL options
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization_header ));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $Notifications = curl_exec($ch);

    curl_close($ch);
    $Notifications =  json_decode($Notifications);
   // var_dump($Notifications);
    
    /*if(!property_exists($Notifications, "message")){
        $NotificationsNumber = count($Notifications->data);
    }*/

}

    require_once '../components/Notification.php';
?>
