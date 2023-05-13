<?php

//Send request to get users in event
$payload = ['EventId' => $event->Id];
$token = GenerateToken($payload);
$UsersJoined = SendRequestToAPI($token, 'http://localhost/EventMap/API/userevent/readEventJoined.php');

if($UsersJoined !== NULL){
    foreach($UsersJoined->data as $Userjoined){

        $token = GenerateToken([]);
        $user = SendRequestToAPI($token, 'http://localhost/EventMap/API/user/readSingle.php?UserId=' . $Userjoined->UserId);
        require '../components/event/EventUserJoined.php';
        }
}

?>

