<?php
class userProfileController{

    public function userProfilePage($userId){
        echo 'loading : succed => User profile loaded';
        require_once '../templates/user/profile/UserProfile.php';
    }

    public function userProfilePageNotFound(){
        echo 'loading : failled => User profile not found';
    }

    public function wrongUserProfilePagePath(){
        echo 'loading : failled => Wrong path';
    }

    public function loadSelfPage(){
        if(isset($_SESSION['user'])){
            $userId = $_SESSION['user']->UserId;
            echo 'loading : succed => Self Profile loaded';
            require_once '../templates/user/profile/UserProfile.php';
        }
        else{
            header('Location: /login');
        }

    }
}
?>