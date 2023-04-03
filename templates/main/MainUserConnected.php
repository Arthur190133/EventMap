<?php

echo 'user connected';

//requete

$url = "http://localhost/EventMap/API/event/readRecommendationEvent.php";
$token = GenerateToken([]);
var_dump($token);

$events = SendRequestToAPI($token, $url);

var_dump($events->data[0]);


require_once '../Pages/main/MainUserConnected.php';

?>