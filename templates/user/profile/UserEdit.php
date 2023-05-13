<?php

$oldAvatarId = null;
$oldBackgroundId = null;

function uploadImage($file, $path)
{
    $file_name = $_FILES[strval($file)]['name'];
    $file_tmp = $_FILES[strval($file)]['tmp_name'];
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));
  
    // Vérifier que l'extension du fichier est autorisée
    $allowed_extensions = array("jpg", "jpeg");
    if(!in_array($file_ext, $allowed_extensions) === false) 
    {
        // Copier l'image dans le répertoire souhaité
        $upload_path = $path . $_SESSION["user"]->UserId . "/";
        var_dump($upload_path);
        if (!is_dir($upload_path)) 
        {
        mkdir($upload_path, 0777, true);
        }else
        {
            // Supprimer tout ce qu'il y a dans le dossier
            if ($handle = opendir($upload_path)) 
            {

                // Parcourir tous les fichiers et dossiers dans le dossier
                while (false !== ($entry = readdir($handle))) 
                {
                    
                    // Ignorer les fichiers "." et ".."
                    if ($entry != "." && $entry != "..") 
                    {
                        
                        // Vérifier si l'entrée est un dossier
                        if (is_dir($upload_path.'/'.$entry)) 
                        {
                            
                            // Supprimer le dossier et son contenu
                            rmdir($upload_path.'/'.$entry);
                            
                        } else 
                        {
                            
                            // Supprimer le fichier
                            unlink($upload_path.'/'.$entry);
                        }
                    }
                }
            
                // Fermer le dossier
                closedir($handle);
            }
        }


    $new_file_name = uniqid() . "." . $file_ext;
    $dest_path = $upload_path . $new_file_name;

    move_uploaded_file($file_tmp, $dest_path);
    $file = null;

    $url = "http://localhost/EventMap/API/image/create.php";

    $payload = [
        "ImageDir" => $dest_path,
        "ImageName" => $file_name
    ];

    $token = GenerateToken($payload);

    return SendRequestToAPI($token, $url);   


    }
    
}
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        // UPLOAD BACKGROUND 
    if(isset($_FILES['backgroundImage'])) 
    {
        $result = uploadImage("backgroundImage", "Images/users/backgrounds/");
        if(isset($result->ImageId))
        {
    
            $oldBackgroundId = $_SESSION["user"]->UserBackgroundId ;
            $_SESSION["user"]->UserBackgroundId = $result->ImageId;
        }
    }

    if(isset($_FILES['AvatarImage'])) 
    {
        $result = uploadImage("AvatarImage", "Images/users/avatars/");
        if(isset($result->ImageId))
        {
    
            $oldAvatarId = $_SESSION["user"]->UserAvatarId ;
            $_SESSION["user"]->UserAvatarId = $result->ImageId;
        }
    }

}




   
if(empty($_POST["userFirstName"]) || empty($_POST["userName"]))
{
    $message="Error";
    require_once '../components/user/UserInputError.php';
}
else{
    $url = "http://localhost/EventMap/API/user/update.php";
    $payload = [
        "UserId" => $_SESSION["user"]->UserId,
        "UserBackgroundId" => $_SESSION["user"]->UserBackgroundId,
        "UserAvatarId" => $_SESSION["user"]->UserAvatarId,
        "UserFirstName" => $_POST["userFirstName"],
        "UserName" => $_POST["userName"],
        "UserDescription" => $_POST["userDescription"]

    ];
    $token = GenerateToken($payload);

    $result = SendRequestToAPI($token, $url);


    // Delete old background image

    $url = "http://localhost/EventMap/API/image/delete.php";
    $payload = [
        "ImageId" => $oldBackgroundId
    ];

    $token = GenerateToken($payload);
    SendRequestToAPI($token, $url);

    // Delete old avatar image

    $payload = [
        "ImageId" => $oldAvatarId
    ];
    $token = GenerateToken($payload);
    SendRequestToAPI($token, $url);
    

    header("location: /profile");
    }
require_once '../pages/user/profile/userEdit.php';


?> 

