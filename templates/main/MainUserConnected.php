<?php

echo 'user connected';

//requete

$url = "http://localhost/EventMap/API/event/readRecommendationEvent.php";
$token = GenerateToken([]);

$events = SendRequestToAPI($token, $url);

var_dump($events);


require_once '../Pages/main/MainUserConnected.php';

?>