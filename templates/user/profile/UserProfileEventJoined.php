<?php

$url ="http://localhost/EventMap/API/userevent/readUserJoined.php";
$token = GenerateToken(['UserId' => $userId]);
$Events = SendRequestToAPI($token, $url);

if($Events)
 {
    $Events = $Events->data;
    foreach($Events as $Event)
    {
        require '../templates/User/profile/UserProfileEventCard.php';
    }
}else{
    $NoEventMessage = "Aucun évènement trouvé.";
    require '../Pages/User/profile/UserProfileNoEvent.php';
}
    

?>