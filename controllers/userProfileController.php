<?php
class userProfileController{

    public function userProfilePage($user){
        echo 'loading : succed => User profile loaded';
        require_once '../templates/user/UserProfile.php';
    }

    public function userProfilePageNotFound(){
        echo 'loading : failled => User profile not found';
    }

    public function wrongUserProfilePagePath(){
        echo 'loading : failled => Wrong path';
    }

    public function loadSelfPage($user){
        if(isset($_SESSION['user'])){
            echo 'loading : succed => Self Profile loaded';
            require_once '../templates/user/UserProfile.php';
        }
        else{
            header('Location: /login');
        }

    }
}
?>