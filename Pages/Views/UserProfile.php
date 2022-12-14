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
        $UserAvatar = $UserAvatar -> ImageDir;
    }
    else
    {
        $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png";
    }

?>

<div>
    <span>UserName</span>
    <div class="ContentButtonUserAvatar">
        <input accept="image/png, image/jpeg" class="ButtonChangeUserAvatar" type="file"> 
            <img class="ButtonUserAvatar"type="image" src=<?= $UserAvatar?> alt="UserAvatar">
            <img class="ButtonUserAvatarHover" src="Images/logos/Camera.png">   
        </input>  
    </div>


</div>
