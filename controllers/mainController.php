<?php

class mainController
{

    private function isUserConnected():bool
    {
        return isset($_SESSION['user']);
    }

    public function index()
    {
        
    }
    
    public function profile(){
        if($this->isUserConnected()){
            require_once '../templates/user/UserProfile.php';
        }
        else{
            header('Location: /login');
        }
        
    }

    public function events(){
        require_once '../templates/event/Events.php';
    }

    public function login(){
        if(!$this->isUserConnected()){
            require_once '../templates/login.php';
        }
        else{
            header('Location: /');
        }
        
    }

    public function register(){
        if(!$this->isUserConnected()){
            require_once '../templates/registerConfig.php';
        }
        else{
            header('Location: /');
        }
        
    }

    public function map(){
        require_once '../Pages/views/Maps.php';
    }

    public function logout(){
      session_destroy();
      header('Location: /');
    }

    public function event(){
        require_once '../router/EventRouter.php';
        //require_once '../controllers/mainController.php';
        echo '----------------test only Call EventController to access to event page by id';
        $EventRouter = new EventRouter();
        $EventRouter->resolve();

    }

    public function wallet(){
        if($this->isUserConnected()){
            require_once '../templates/Wallet.php';
        }
        else{
            header('Location: /login');
        }
        
    }
}

?>