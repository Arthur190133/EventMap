<?php

$url = "http://localhost/EventMap/API/event/readCreatedByUser.php";
$token = GenerateToken(['OwnerId' => $userId]);
$Events = SendRequestToAPI($token, $url);




if($Events)
 {
    $Events = $Events->data;
    foreach($Events as $Event)
    {
        require '../templates/User/UserProfileEventCard.php';
    }
}
else{
    $NoEventMessage = "Aucun évènement trouvé.";
    require '../Pages/User/UserProfileNoEvent.php';
}
    

?>