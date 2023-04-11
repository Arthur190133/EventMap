<?php

$JoinableEvent = "REJOINDRE";

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

//Send request to get users in event
$payload = ['EventId' => $event->Id];
$token = GenerateToken($payload);
$UsersJoined = SendRequestToAPI($token, 'http://localhost/EventMap/API/userevent/readEventJoined.php');

if($UsersJoined !== NULL){
    foreach($UsersJoined->data as $Userjoined){

        $token = GenerateToken([]);
        $user = SendRequestToAPI($token, 'http://localhost/EventMap/API/user/readSingle.php?UserId=' . $Userjoined->UserId);
        var_dump($user);
        echo '----------------------------------------';
        }
}





require_once '../Pages/event/Event.php';

?>