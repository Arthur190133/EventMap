<?php

class eventController
{
    public function eventPage($event){
        echo 'loading succed ';
        require_once '../templates/event/Event.php';
    }

    public function wrongEventPagePath(){
        echo 'loading failled : path is incorrect';
    }

    public function eventPageNotFound(){
        echo 'loadiing failled : event doesnt exist';
    }

    public function register(){
        require_once '../Pages/event/EventRegister.php';
    }


}

?>