<?php

$JoinableEvent = "REJOINDRE";
$privacy = "None";

//var_dump($event);

$UserId = isset($_SESSION['user']->UserId) ? $_SESSION['user']->UserId : null;
$payload = ['EventId' => $event->Id, 'UserId' => $UserId];
$token = GenerateToken($payload);
$IsUserJoined = SendRequestToAPI($token, 'http://localhost/EventMap/API/userevent/readUserIsInEvent.php');

if($IsUserJoined === NULL){
    if($event->Private)
    {
        $JoinableEvent = "DEMANDEZ UNE INVITATION";
    }   
    else{
        $JoinableEvent = "REJOINDRE";
    }
}
else{
    $JoinableEvent = "QUITTER";
}

if($event->Private)
{
    $privacy = "Privé";
}
else{$privacy="Publique";}

$url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $event->OwnerId;
$token = GenerateToken([]);
$user = SendRequestToAPI($token, $url);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if($IsUserJoined === NULL){

        if($event->Private)
        {
            $context = "Vous avez reçus une demande d'invitation à votre évènement {EventId=" . $event->Id ."}";
            SendNotification("User", $_SESSION['user']->UserId, $event->OwnerId, $context);
        }
        else{
            //Join event
            $url = "http://localhost/EventMap/API/userevent/create.php";
            $payload = [
                'UserId' => $_SESSION['user']->UserId,
                'EventId' => $event->Id
            ];
            $token = GenerateToken($payload);
            $result = SendRequestToAPI($token, $url);

            header('Location: /Event/' . $event->Id);
            exit();
        }
    }
    else{
        // Leave event
        $url = "http://localhost/EventMap/API/userevent/delete.php";
        $payload = [
            'UserId' => $_SESSION['user']->UserId,
            'EventId' => $event->Id
        ];
        $token = GenerateToken($payload);
        $result = SendRequestToAPI($token, $url);
        header('Location: /Event/' . $event->Id);
        exit();
    }

}








require_once '../Pages/event/Event.php';

?>