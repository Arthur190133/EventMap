<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Admin.php';

    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Admin object
    $Admin = new Admin($db);

    // Get Id
    $Admin->UserId = $payload->UserId;

    $isAdmin = $Admin->IsAdmin();

    $Admin_arr = array(
        'IsAdmin' => $isAdmin
    );

    print_r(json_encode($Admin_arr));

    


?>