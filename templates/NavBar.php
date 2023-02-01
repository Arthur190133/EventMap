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
    $UserProfileLink = "login"; 
    $UserAvatarName = "UserAvatar";
    $UserButtonLocation = "templates/user/UserButtonProfile.php";
    if($user){
        $UserButtonLocation = "templates/user/NavBarUserButton.php";
        $UserProfileLink = "user-profile";
        if($UserAvatarName)
        {
            $UserAvatarName = $user->UserAvatarName;
        }
        
    }


    require_once '../components/NavBar.php';
?>