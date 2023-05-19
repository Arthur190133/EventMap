<?php

require_once '../Pages/tools/functions.php';
require_once '../API/JWT.php';

$data = json_decode(file_get_contents('php://input'));
$eventname = $data->EventName;

$url = "http://localhost/EventMap/API/event/search.php";
$payload = ['EventName' => $eventname];
$token = GenerateToken($payload);
$result = SendRequestToAPI($token, $url);
$result = json_encode($result, JSON_HEX_TAG);
echo $result;

?>