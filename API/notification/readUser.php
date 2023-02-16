<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Notification.php';

    // Instantiation Database
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation Notification object
    $Notification = new Notification($db);

    $user = json_decode(file_get_contents("php://input"), true);
    $user = $user[0];




    //RECUPERER TOKEN POUR VERIFIER SI PEUT UTILISER API
    $secret_file = str_replace("public", "", $_SERVER['DOCUMENT_ROOT']) . "config/secret.key";
    // Vérifie si le fichier de clé secrète existe déjà
    if (!file_exists($secret_file)) {
        // Si le fichier n'existe pas, crée une nouvelle clé secrète et l'enregistre dans le fichier
        $secret_key = base64_encode(random_bytes(32));
        file_put_contents($secret_file, $secret_key);
    } else {
        // Si le fichier existe déjà, récupère la clé secrète à partir du fichier
        $secret_key = file_get_contents($secret_file);
        
    }


    //$secret_key = base64_decode($secret_key);

    $token = null;
    $headers = apache_request_headers();
    
    if (isset($headers['Authorization'])) {
        $matches = array();
        if (preg_match('/Bearer (.+)/', $headers['Authorization'], $matches)) {
            $token = $matches[1];
        }
    }
    if (!$token) {
        // token non trouvé dans le header
        http_response_code(401);
        echo json_encode(
            array('message' => 'Access refuse : invalid token'));
        exit;
    }
    $keys = ['test' => $secret_key];



    

    try {
        // Vérifiez la signature du token

        try{
            $decoded = JWT::decode($token, $keys, array('HS256'));
            print_r($decoded);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        //$decoded = JWT::decode($token, $secret_key, array('HS256'));
    
        // Si la signature est valide, vous pouvez utiliser les informations du token
        $user_id = $decoded->user_id;
        $username = $decoded->username;
    
        // Faites quelque chose avec ces informations...
        if ($user === null) {
            echo 'no user selected';
        } else {
            $Notification->UserId = $user['UserId'];
            // Notification querry
            $result = $Notification->readUser();
            // get row count
            $num = $result->rowCount();
    
            // check if any Notifications
            if ($num > 0) {
                $Notifications_arr = array();
                $Notifications_arr['data'] = array();
    
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $Notification_item = array(
                        'Id' => $NotificationId,
                        'Sender' => $NotificationSender,
                        'Context' => $NotificationContext,
                        'Status' => ($NotificationStatus) ? 'already read' : 'not read yet',
                        'Date' => $NotificationDate,
                        'UserId' => $UserId,
                        'UserName' => $UserName,
                        'UserFirstName' => $UserFirstName,
                        'UserAvatarDir' => $UserAvatarDir,
                        'UserAvatarName' => $UserAvatarName
                    );
    
                    // push to 'data'
                    array_push($Notifications_arr['data'], $Notification_item);
                }
    
                // To json
                echo json_encode($Notifications_arr);
            } else {
                // pas d'utilisateur
                echo json_encode(
                    array('message' => 'No Notification found')
                );
            }
        }
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(
            array('message' => 'Access refuse : '));
        exit;
        // Gérez les erreurs de validation de la signature ici
    }

    


?>