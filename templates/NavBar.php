<?php

    // Set user avatar with is own one
    $UserAvatar = "Images/Users/Avatars/default/DefaultAvatar.png";
    if(isset($user) && $user)
    {
        if($user->UserAvatarDir){
            $UserAvatar = $user->UserAvatarDir;    
        }
        
    }

    // If not connected default link will redirect to login page, otherwise the button will link to user profile page
    $UserProfileLink = "?/Login"; 
    $UserAvatarName = "UserAvatar";
    if($user){
        $UserProfileLink = "?/UserProfile";
        if($UserAvatarName)
        {
            $UserAvatarName = $user->UserAvatarName;
        }
        
    }


    require_once 'components/NavBar.php';
?>