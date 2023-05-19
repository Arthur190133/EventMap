<?php
if(isset($_GET['query'])) {
    $query = $_GET['query'];
    
    $query = str_replace("%20", " ", $query);
    $url = "http://localhost/EventMap/API/event/search.php";
    $payload = ['EventName' => $query];
    $token = GenerateToken($payload);
    $result = SendRequestToAPI($token, $url);
    var_dump($result);
}
?>