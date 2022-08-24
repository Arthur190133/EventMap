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
    <h2 class="NavBarLogo">LOGO</h2>
    <a>
        <img src="Images/logos/Camera.png">
    </a>
    <a>
        <img src="Images/logos/Camera.png">
    </a>    <a>
        <img src="Images/logos/Camera.png">
    </a>    <a>
        <img src="Images/logos/Camera.png">
    </a>
    <div class="NavBarUserContent">
        <input onclick="GotoUserProfile()" type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?> alt="UserAvatar"></input>
    </div>
</div>

