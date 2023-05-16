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


 






require_once '../Pages/event/Event.php';

?>