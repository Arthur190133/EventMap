<?php
    //$mesEvent=GetEvents();
    //GetMesEvent()
    $mesEvent = json_decode(file_get_contents('http://localhost/EventMap/API/event/read.php'));

    require_once '../Pages/User/UserProfile.php';
?>




