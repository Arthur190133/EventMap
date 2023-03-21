<?php


function GetNumberOfParticipants ($EventId):int
{

    global $Db;
    $Querry = $Db -> prepare("SELECT COUNT(*) as UserNumber from UserEvent where EventId like :EventId");
    $Querry -> execute([
        'EventId' => $EventId
    ]);
    return ($Querry -> fetch())->UserNumber;
}

function GetNumberOfEvents():int
{
    global $Db;
    $Querry = $Db -> query("SELECT COUNT(*) as EventNumber from event");
    return ($Querry -> fetch())->EventNumber;
}

function GetImageFromTable ($ImageId):string
{
    global $Db;
    $Querry = $Db -> prepare("SELECT * from image where ImageId like :ImageId");
    $Querry -> execute([
        'ImageId' => $ImageId
    ]);
    $Image = $Querry -> fetch();

    if($Image){ return $Image->ImageDir; }
    return "";
}   

function GetUserAvatar()
{
    if(isset($user))
    {
        $Avatar = GetImageFromTable($user->UserAvatarId);
       if(file_exists($Avatar))
       {
           return $Avatar -> ImageDir;     
       }
    }
}

function GetEvents(){
    global $Db;

    $Querry = $Db -> query("SELECT * from event");
    $Rows = $Querry -> fetchAll(PDO::FETCH_CLASS);
    return $Rows;
}


function GetEvent($EventId)
{
    global $Db;
    $Querry = $Db -> prepare("SELECT * FROM event WHERE EventId like :EventId ");
    $Querry -> execute([
        'EventId' => $EventId
    ]);
    return $Querry -> fetch();
}

function GetUser($UserId){
    global $Db;
    $Querry = $Db -> prepare("SELECT * FROM User WHERE UserId like :UserId ");
    $Querry -> execute([
        'UserId' => $UserId
    ]);
    return $Querry -> fetch();
}

function GetUserNotifications($UserId){
    global $Db;
    $Querry = $Db -> prepare("SELECT * FROM notification WHERE NotificationStatus like 0 and UserId like :UserId");
    $Querry -> execute([
        'UserId' => $UserId
    ]);
    return $Querry -> fetchAll(PDO::FETCH_CLASS);
}

function CheckIfUserExist($Email):bool{
    global $Db;
    $Querry = $Db -> prepare("SELECT * from user where UserEmail like :UserEmail");
    $Querry -> execute([
        "UserEmail" => $Email
    ]);
    $UserExist = $Querry->fetch();

    if($UserExist){ return true; }
    return false;
}

function CreateUser($FirstName, $Name, $Email, $Password, $Description){
    if(!CheckIfUserExist($Email))
    {
        global $Db;
        // Insert User images (background, avatar)
        // $UserAvatarId = InsertImage($ImageName, $ImageDir); // créer l'emplacement pour l'image
        // Insert User
        $Querry = $Db -> prepare("INSERT INTO user(UserFirstName, UserName, UserEmail, UserPassword, UserDescription, UserAvatarId, UserBackgroundId) VALUES (:UserFirstName, :UserName, :UserEmail, :UserPassword, :UserDescription, :UserAvatarId, :UserBackgroundId)");
        $Querry -> execute([
            'UserFirstName' => $FirstName,
            'UserName' => $Name,
            'UserEmail' => $Email,
            'UserPassword' => password_hash($Password, PASSWORD_DEFAULT),
            'UserDescription' => $Description,
            'UserAvatarId' => NULL,
            'UserBackgroundId' => NULL
        ]);      
    }
}

function Login($Email, $Password){
    global $Db;
    $Querry = $Db -> prepare("SELECT * from user where UserEmail like :UserEmail");
    $Querry -> execute([
        'UserEmail' => $Email
    ]);
    $user = $Querry->fetch(PDO::FETCH_ASSOC);
    if(password_verify($Password, $user['UserPassword']))
    {
        $_SESSION['user'] = $user;
    }
    else{
        echo "LOGIN FAILED";
    }
}


function InsertImage($ImageName, $ImageDir):int
{
    global $Db;

    $Querry = $Db -> prepare("INSERT INTO image(ImageName, ImageDir) VALUES (:ImageName, :ImageDir)");
    $Querry -> execute([
        'ImageName' => $ImageName,
        'ImageDir' => $ImageDir
    ]);
    return $Db->lastInsertId();   
}

function CreateImageDir($ImageLocation, $User)
{
    if (!mkdir($ImageLocation, 0777, true)) {
        die('Échec lors de la création des dossiers...');
    }
}

function updateProfil(user,UserFirstName,UserName,UserDescription)
{
    $token=GenerateToken([])
    'user' => $_SESSION['user']->id,
    'UserFirstName' => $_POST['UserFirstName'],
    'UserName' => $_POST['UserName'],
    'UserDescription' => $_POST['UserDescription']
}
?>