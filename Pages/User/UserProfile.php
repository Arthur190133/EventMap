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
    <input type="image" class="ButtonUserAvatar" src=<?= $UserAvatar?>>
    <img src="Images/logos/Camera.png">
    </input>
</div>
