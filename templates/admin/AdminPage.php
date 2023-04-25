<?php
$token = GenerateToken(['AdminId' => 1]);
var_dump($token);
$url = 'http://localhost/EventMap/API/admin/delete.php';
$result = SendRequestToAPI($token,$url);
var_dump($result);
require_once '../Pages/Admin/AdminPage.php';

?>
