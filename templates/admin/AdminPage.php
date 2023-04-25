<?php
$token = GenerateToken(['AdminId' => 1]);
$url = 'http://localhost/EventMap/API/user/delete.php';
$result = SendRequestToAPI($token,$url);
require_once '../Pages/Admin/AdminPage.php';

?>
