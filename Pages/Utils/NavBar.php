<?php
    global $Db;
    $UserId = 3;
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

?>
<div class="NavBar">
    <img class="NavBarLogo" src="Images/logos/EventMap.png">
    <a>
        <img class="img" src="Images/logos/Camera.png">
        <h6>!!Carte </h6>
    </a>
    <a>
        <div class="BellNotification" Notification="98">
            <img class="img" src="Images/logos/Bell.png">
        </div> 
    </a>    <a>
        <img class="img" src="Images/logos/Camera.png">
    </a>    <a>
        <img class="img" src="Images/logos/Camera.png">
        <h6>!!Evenement finis </h6>
    </a>
    <div class="NavBarUserContent">
        <input onclick="GotoUserProfile()" type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?> alt="UserAvatar"></input>
    </div>
</div>

