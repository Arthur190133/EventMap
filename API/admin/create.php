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
    $Admin->AdminStartDate = $payload->AdminStartDate;
    $Admin->AdminEndDate = $payload->AdminEndDate;


    $result = $Admin->create();

    $Admin_arr = array(
        'hasBeenCreated' => $result
    );

    print_r(json_encode($Admin_arr));
?>
    