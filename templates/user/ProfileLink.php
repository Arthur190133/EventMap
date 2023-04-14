<?php
    $UserProfileLink = "/profile/" . $user->UserId;
    $UserAvatarName = "";
    $UserAvatar = "/" . $user->UserAvatarDir;
    require '../components/user/ProfileLink.php';

?>