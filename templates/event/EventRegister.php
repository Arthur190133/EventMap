<?php

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




if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //save inputs
    $_SESSION['SavedEventName'] = $_POST['EventName'];
    $_SESSION['SavedEventLocation'] = $_POST['EventLocation'];
    $_SESSION['SavedEventCategory'] = $_POST['EventCategory'];
    $_SESSION['SavedEventStartDate'] = $_POST['EventStartDate'];
    $_SESSION['SavedEventEndDate'] = $_POST['EventEndDate'];

    $EventPrice = 0;
    $EventNumber = 0;
    $EventPrivate = false;
    $EventPaid = false;
    

    if(((empty($_POST['EventName']) && empty($_POST['EventLocation']) && empty($_POST['EventCategory']) && empty($_POST['EventStartDate']) && empty($_POST['EventEndDate']) && empty($_POST('EventDescription')))))
    {
        
        if(isset($_POST['EventPrivate'])){
            $EventPrivate = true;
        }

        if(isset($_POST['EventPaid'])){
            $EventPaid = true;
        }
        
        
        if($_POST['EventPaid'] == true){
            $EventPrice = isset($_POST['EventPrice']) ? $_POST['EventPrice'] : 0;
        }

        
        if($_POST['EventPrivate'] == true){
            $EventPrivate = isset($_POST['EventPrivate']) ? $_POST['EventPrivate'] : 0;
        }
        
    }

    //upload images
    echo 't';

    $ThumbnailId = null;

    if(isset($_FILES['EventThumbnail'])){
        $result = uploadImage("EventThumbnail", "Images/events/thumbnails/");
        if(isset($result)? $ThumbnailId = $result->ImageId : null);
    }

    $BackgroundId = null;

    if(isset($_FILES['EventBackground'])){
        $result = uploadImage("EventBackground", "Images/events/backgrounds/");
        if(isset($result) ? $BackgroundId = $result->ImageId : null);
    }

    


    //Send request to API
    $url = "http://localhost/EventMap/API/event/create.php";
    var_dump($BackgroundId);
    var_dump($ThumbnailId);
    $payload=[
        "EventName" => $_POST['EventName'],
        "EventLocation" => $_POST['EventLocation'],
        'EventCategory' => $_POST['EventCategory'],
        "EventStartDate" => $_POST['EventStartDate'],
        "EventEndDate" => $_POST['EventEndDate'],
        "EventPrivate" => intval($EventPrivate),
        "EventPrice" => $EventPrice,
        "EventNumber" => $EventNumber,
        "EventThumbnailId" => $ThumbnailId,
        "EventBackgroundId" => $BackgroundId,
        "EventOwnerId" => intval($_SESSION["user"]->UserId),
        "EventDescription" => $_POST['EventDescription'],
        "EventPageColor" => "",
        "EventCardColor" => ""
    ];



    $token = GenerateToken($payload);

    $result = SendRequestToAPI($token, $url);

   // $_SERVER['REQUEST_METHOD'] = null;

    if($result){
       //header("location :/event/" . $result->Id);
       header('Location: /event/' . $result->Id);
    }

   
}

//load saved inputs

$SavedEventName = "";
if(isset($_SESSION['SavedEventName'])){$SavedEventName = $_SESSION['SavedEventName'];}

$SavedEventLocation = "";
if(isset($_SESSION['SavedEventLocation'])){$SavedEventLocation = $_SESSION['SavedEventLocation'];}

$SavedEventCategory = "";
if(isset($_SESSION['SavedEventCategory'])){$SavedEventCategory = $_SESSION['SavedEventCategory'];}

$SavedEventStartDate = "";
if(isset($_SESSION['SavedEventStartDate'])){$SavedEventStartDate = $_SESSION['SavedEventStartDate'];}

$SavedEventEndDate = "";
if(isset($_SESSION['SavedEventEndDate'])){$SavedEventEndDate = $_SESSION['SavedEventEndDate'];}

require_once '../pages/event/EventRegister.php';

?>