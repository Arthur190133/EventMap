<?php
//requete

$url = "http://localhost/EventMap/API/event/readRecommendationEvent.php";
$token = GenerateToken([]);
$events = SendRequestToAPI($token, $url);

require_once '../Pages/main/MainUserConnected.php';

?>