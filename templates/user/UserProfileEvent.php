<?php


$token = GenerateToken(['UserId' => $_SESSION['user']->UserId]);
var_dump($token);
$IsUserJoined = SendRequestToAPI($token, 'http://localhost/EventMap/API/userevent/readUserJoined.php');
    foreach($Events as $Event)
    {
        require '../Pages/User/UserProfileEventCard.php';
    }

?>