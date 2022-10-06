<?php
    global $Db;
    $UserId = 1;
    $Querry = $Db -> prepare("SELECT * FROM image WHERE ImageId in(SELECT UserAvatarId from user where UserId = :UserId)");
    $Querry -> execute([
        'UserId' => $UserId
    ]);
    $UserAvatar = $Querry -> fetch();
    if($UserAvatar)
    {
        if(file_exists($UserAvatar -> ImageDir))
        {
            $UserAvatar = $UserAvatar -> ImageDir;     
        }
        else{
            $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png"; 
        }  
    }
    else
    {
        $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png";
    }


    $userProfileLink = "?/login";
    $connected = false;

    //
    // Si l'utilisateur est connecté 
    //
    if($connected){
        $userProfileLink = "?/UserProfile";
    }
?>
<div class="NavBar">
    <a href="?/"> 
        <img class="NavBarLogo" src="Images/logos/EventMap.png"> 
    </a>
    <a href="?/map" class="NavBarButton">
        <img class="img" src="Images/logos/Map.png">
    </a>
    <a href="?/Notifications" class="NavBarButton">
        <div class="BellNotification" Notification="98">
            <img class="img" src="Images/logos/Bell.png">
        </div> 
    </a>
    <a class="NavBarButton">
        <img class="img" src="Images/logos/Camera.png">
    </a>
    <a class="NavBarButton">
        <img class="img" src="Images/logos/Camera.png">
        <h6>!!Evenement finis </h6>
    </a>
    
    <div class="NavBarUserContent">
        <a href=<?= $userProfileLink ?>>
        <input type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?> alt="UserAvatar"></input>
        </a>
    </div>
</div>

