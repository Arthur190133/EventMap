<?php


$token = GenerateToken(['UserId' => $_SESSION['user']->UserId]);

$Events = SendRequestToAPI($token, 'http://localhost/EventMap/API/userevent/readUserJoined.php');
    foreach($Events as $Event)
    {
        require '../Pages/User/UserProfileEventCard.php';
    }

?>