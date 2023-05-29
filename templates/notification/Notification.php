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

function GetNotificationLink($id, $NotificationSender, $NotificationId){
    $link = "/";

    if(strpos($NotificationSender, "User") !== false){
        $link = "/invitation/" . $NotificationId;
    }
    elseif(strpos($NotificationSender, "Event") !== false){
        $link = "/event/" . $id;
    }

    return $link;

}

function GetNotificationSender($NotificationSender){
    $Sender = "Unkown";
    if(strpos($NotificationSender, "User") !== false){
        $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . substr($NotificationSender, strpos(($NotificationSender), "=") + 1);
        $token = GenerateToken([]);
        $RequestSender = SendRequestToAPI($token, $url);
        //$RequestSender = json_decode(file_get_contents($url));
        $Sender = array(
            'SenderId' => $RequestSender->UserId,
            'SenderName' => $RequestSender->UserName . " " . $RequestSender->UserFirstName,
            'SenderImage' => $RequestSender->UserAvatarDir
        );
    }
    elseif(strpos($NotificationSender, "Event") !== false){
        $url = "http://localhost/EventMap/API/event/readSingle.php?EventId=" . substr($NotificationSender, strpos(($NotificationSender), "=") + 1);
        $token = GenerateToken([]);
        $RequestSender = SendRequestToAPI($token, $url);
        //$RequestSender = json_decode(file_get_contents($url));
        //print_r($RequestSender);
        $Sender = array(
            'SenderId' => $RequestSender->Id,
            'SenderName' => $RequestSender->Name,
            'SenderImage' => $RequestSender->ThumbnailDir
        );
    
    }

    return $Sender;
}

function supprimerEntreAccolades($chaine) {
    while (($posDebut = strpos($chaine, '{')) !== false && ($posFin = strpos($chaine, '}', $posDebut)) !== false) {
        $chaine = substr_replace($chaine, '', $posDebut, $posFin - $posDebut + 1);
    }
    return $chaine;
}

function GetNotificationContext($NotificationContext):string{
    $Context = $NotificationContext;
    if(strpos($NotificationContext, "EventId") !== false){
        $s =  GetStringBetweenTwoCharacters($NotificationContext, "{", "}");
        $Context = supprimerEntreAccolades($Context);
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

    return "Date inconnue";

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

    $payload = [
        'userId' => $user->UserId,
    ];
    $token = GenerateToken($payload);
    $Notifications = SendRequestToAPI($token, $url);

    if($Notifications){
        $NotificationsNumber = count($Notifications->data);
    }
    
    

}

    require_once '../components/notification/Notification.php';
?>
