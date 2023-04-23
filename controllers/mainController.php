<?php

class mainController
{

    private function isUserConnected():bool
    {
        return isset($_SESSION['user']);
    }

    private function isAdmin():bool
    {
        if($this->isUserConnected()){
        // get admin
        $url = "http://localhost/EventMap/API/admin/IsAdmin.php";
        $payload = ['UserId' => $user->UserId];
        $token = GenerateToken($payload);
        $admin = SendRequestToAPI($token, $url);

        return isset($admin);
        }
        return false;

    }

    public function index()
    {
        if($this->isUserConnected())
        {
            require_once '../templates/main/MainUserConnected.php';
        }else
        {
            require_once '../templates/main/MainUserNotConnected.php';
        }
    }
    
    public function profile(){
        require_once '../router/UserProfileRouter.php';
        require_once '../controllers/UserProfileController.php';
        $UserProfileRouter = new UserProfileRouter();
        $UserProfileRouter->resolve();   
    }
    public function Admin(){
        if($this->isAdmin()){
            require_once '../Pages/Admin/AdminPage.php';
        }
        else{
            header('Location: /');
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
            require_once '../templates/register.php';
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
        require_once '../controllers/eventController.php';
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