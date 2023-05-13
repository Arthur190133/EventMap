<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['backgroundImage'])) {
    $file_name = $_FILES['backgroundImage']['name'];
    $file_tmp = $_FILES['backgroundImage']['tmp_name'];
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));
  
    // Vérifier que l'extension du fichier est autorisée
    $allowed_extensions = array("jpg", "jpeg");
    if(in_array($file_ext, $allowed_extensions) === false) {
      die();
    }
  
    // Copier l'image dans le répertoire souhaité
    $upload_path = "Images/users/backgrounds/" . $_SESSION["user"]->UserId . "/";
    if (!is_dir($upload_path)) {
    mkdir($upload_path, 0777, true);
    }else{
        // Supprimer tout ce qu'il y a dans le dossier
        if ($handle = opendir($upload_path)) {

            // Parcourir tous les fichiers et dossiers dans le dossier
            while (false !== ($entry = readdir($handle))) {
                
                // Ignorer les fichiers "." et ".."
                if ($entry != "." && $entry != "..") {
                    
                    // Vérifier si l'entrée est un dossier
                    if (is_dir($upload_path.'/'.$entry)) {
                        
                        // Supprimer le dossier et son contenu
                        rmdir($upload_path.'/'.$entry);
                        
                    } else {
                        
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
    $_FILES['backgroundImage'] = null;

    header("Location: /registerConfig");
    exit();
  }

?>

<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<form method="post" id="formImage" enctype="multipart/form-data">
<div>
    <div class="button-wrapper">
        <button id='button-import-background' type="button" class="custom-button" onclick="document.getElementById('GetFileBackground').click()">
            <input name="backgroundImage" id="GetFileBackground"  type="file" placeholder="Votre avatar" style="display:none">
            <span class="svg-overlay">
                <img src="/Images/Logos/Camera.png" height="128px" width="128px" alt="Votre SVG" />
            </span>
        </button>
    </div>



    <div class="login-content-images">      
        <div class="login-content-image">
            <button class="" type="button" onclick="document.getElementById('GetFileAvatar').click()">
                Choisissez votre avatar.
            </button>
            <input id="GetFileAvatar"  type="file" placeholder="Votre avatar" style="display:none">
            <img id="user-imported-avatar" class="login-content-preview-image" src="Images\Users\Avatars\default\DefaultAvatar.png">
        </div>				
    </div>
</div>
<input type="submit"  name="submit" value="Upload" />
</form>



<script src="js/configregister.js">
</script> 