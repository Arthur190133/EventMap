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

    // image querry
    $result = $image->readAll();
    // get row count
    $num = $result->rowCount();

    // check if any images
    if($num > 0)
    {
        $images_arr = array();
        $images_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $image_item = array(
                'Id' => $ImageId,
                'Name' => $ImageName,
                'Dir' => $ImageDir
            );

            // push to 'data'
            array_push($images_arr['data'], $image_item);
        }

        // To json
        echo json_encode($images_arr);
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No Image found')
        );
    }


?>