<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation user object
    $user = new User($db);

    // User querry
    $result = $user->readAll();
    // get row count
    $num = $result->rowCount();

    // check if any users
    if($num > 0)
    {
        $users_arr = array();
        $users_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $user_item = array(
                'Userid' => $UserId,
                'UserFirstName' => $UserFirstName,
                'UserName' => $UserName,
                'UserEmail' => $UserEmail,
                'UserPassword' => $UserPassword,
                'UserDescription' => $UserDescription,
                'UserAvatarName' => $UserAvatarName,
                'UserAvatarDir' => $UserAvatarDir,
                'UserBackgroundName' => $UserBackgroundName,
                'UserBackgroundDir' => $UserBackgroundDir
            );

            // push to 'data'
            array_push($users_arr['data'], $user_item);
        }

        // To json
        echo json_encode($users_arr);
    }
    else
    {
        // pas d'utilisateur
        echo json_encode(
            array('message' => 'No User found')
        );
    }


?>