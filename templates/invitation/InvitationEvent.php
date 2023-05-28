<?php


function UpdateNotificationStatus(){

    $url = "http://localhost/EventMap/API/notification/updateStatus.php";
    $payload = [
        'NotificationId' => $NotificationId
    ];
    $token = GenerateToken($payload);
    $result = SendRequesToAPI($token, $url);
}

function GetEventId($chaine){
    $debut = "{EventId=";
    $fin = "}";
    
    $posDebut = strpos($chaine, $debut);
    if ($posDebut !== false) {
        $posFin = strpos($chaine, $fin, $posDebut);
        if ($posFin !== false) {
            $longueur = $posFin - $posDebut - strlen($debut);
            $eventId = substr($chaine, $posDebut + strlen($debut), $longueur);
            $eventId = intval($eventId);
            
            return $eventId;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['accepted'])){
        //update notifiation has "was read"
        $url= "http://localhost/EventMap/API/notification/updateStatus.php";
        $payload = [
            'NotificationId' => $NotificationId
        ];
        $token = GenerateToken($payload);

        $result = SendRequestToAPI($token, $url);
        
        if($result){

            $url= "http://localhost/EventMap/API/notification/readSingle.php";
            $payload = [
                'NotificationId' => $NotificationId
            ];
            $token = GenerateToken($payload);
            $notification = SendRequestToAPI($token, $url);

            if($notification){
                $EventId = GetEventId($notification->Context);
                $UserId = $notification->UserId;
                var_dump($EventId);
    
                $url = "http://localhost/EventMap/API/userevent/create.php";
                $payload = [
                    "EventId" => $EventId,
                    "UserId" => $UserId
                ];
                $token = Generatetoken($payload);
                $result = SendRequestToAPI($token, $url);
    
                if($result){
                    UpdateNotificationStatus();
                    header("Location: /");
                }
            }


        }
    }

    if(isset($_POST['refused'])){
        UpdateNotificationStatus();
        header("Location: /");
    }
}

require_once '../pages/invitation/InvitationEvent.php';

?>