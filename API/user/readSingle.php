<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation user object
    $user = new User($db);
    
    // Get Id
    $user->UserId = isset($_GET['UserId']) ? $_GET['UserId']: die();
    $user->readSingle();
    
    if($user->UserId != ""){
        $user_arr = array(
            'UserId' => $user->UserId,
            'UserFirstName' => $user->UserFirstName,
            'UserName' => $user->UserName,
            'UserEmail' => $user->UserEmail,
            'UserPassword' => $user->UserPassword,
            'UserDescription' => $user->UserDescription,
            'UserWallet' => $user->UserWallet,
            'UserAvatarName' => $user->UserAvatarName,
            'UserAvatarDir' => $user->UserAvatarDir,
            'UserBackgroundName' => $user->UserBackgroundName,
            'UserBackgroundDir' => $user->UserBackgroundDir
        );
    }

    print_r(json_encode($user_arr));

    

    


?>