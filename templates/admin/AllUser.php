<?php
    $url = "http://localhost/EventMap/API/user/read.php";
    $token = GenerateToken([]);
    $users = SendRequestToApi($url, $token);
?> 