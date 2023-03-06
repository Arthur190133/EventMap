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

    public function register(){
        require_once '../templates/register.php';
    }

    public function map(){
        require_once '../Pages/views/Maps.php';
    }

    public function logout(){
      session_destroy();
      echo "<script>location.href='/'</script>";
    }

    public function event(){
        require_once '../router/EventRouter.php';
        //require_once '../controllers/mainController.php';
        echo '----------------test only Call EventController to access to event page by id';
        $EventRouter = new EventRouter();
        $EventRouter->resolve();

    }

    public function wallet(){
        require_once '../templates/Wallet.php';
    }
}

?>