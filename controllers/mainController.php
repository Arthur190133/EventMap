<?php

class mainController
{
    public function index()
    {
        
    }
    
    public function userProfile(){
        require_once '../templates/user/UserProfile.php';
    }

    public function events(){
        require_once '../templates/event/Events.php';
    }

    public function login(){
        require_once '../templates/user/login.php';
    }
}

?>