<?php

require_once '../Pages/tools/functions.php';
require_once '../API/JWT.php';

$url = "http://localhost/EventMap/API/Event/readMarker.php";
$token = GenerateToken([]);
$result = SendRequestToAPI($token, $url);

if(isset($result)){
 $markerMapsDataJSON = json_encode($result, JSON_HEX_TAG);
 echo $markerMapsDataJSON;
}

?>