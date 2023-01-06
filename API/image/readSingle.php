<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/image.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation image object
    $image = new Image($db);

    // Get Id
    $image->ImageId = isset($_GET['ImageId']) ? $_GET['ImageId'] : die();

    $image->readSingle();

    $image_arr = array(
        'Id' => $image->ImageId,
        'Dir' => $image->ImageDir,
        'Name' => $image->ImageName,
    );

    print_r(json_encode($image_arr));

    


?>