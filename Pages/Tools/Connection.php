<?php

$Server = "mysql:host=localhost;dbname=eventmap;port=3306";
$UserName = "root";
$Password = "root";

$Db = new PDO($Server, $UserName, $Password,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
?>