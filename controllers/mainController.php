<?php

class mainController
{
    public function index()
    {
        
    }
    
    public function profile(){
        require_once '../templates/user/UserProfile.php';
    }

    public function events(){
        require_once '../templates/event/Events.php';
    }

    public function login(){
        require_once '../templates/login.php';
    }

    public function map(){
        require_once '../Pages/views/Maps.php';
    }

    public function logout(){
      session_destroy();
      header("location: /");
    }
}

?>