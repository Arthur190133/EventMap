<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';

    include_once '../../models/Image.php';

    $payload = json_decode(require_once '../auth.php');


    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();
 
    // Instantiation Image object
    $Image = new Image($db);

    // Get Id
    $Image->ImageId = $payload->ImageId;

    $result = $Image->delete();

    $Image_arr = array(
        'hasBeenDeleted?' => $result
    );

    print_r(json_encode($Image_arr));
    
?>
