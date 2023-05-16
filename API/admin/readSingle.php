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
    $Admin->AdminId = isset($_GET['AdminId']) ? $_GET['AdminId']: die();
    $Admin->readSingle();
    
    if($Admin->AdminId != ""){
        $Admin_arr = array(
            'AdminId' => $Admin->AdminId,
            'AdminStartDate' =>$Admin->AdminStartDate,
            'AdmEndDate' =>$Admin->AdminEndDate,
            'UserId' => $Admin->UserId
        );
    }

    print_r(json_encode($Admin_arr));

    

    


?>