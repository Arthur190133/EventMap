<?php

    $Events = json_decode(file_get_contents('http://localhost/EventMap/API/event/read.php'));
    $Events = $Events->data;
    foreach($Events as $Event)
    {
        require '../Pages/User/UserProfileEventCard.php';
    }

?>