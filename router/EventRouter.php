<?php

class EventRouter
{
    public function resolve()
    {

        //$eventId = explode("/",$_SERVER['REQUEST_URI'])[2];
        //$eventId = 0;
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            echo 'Wrong eventPage Path';
        }
        else{
            $eventId = explode("/",$_SERVER['REQUEST_URI'])[2];
            var_dump($eventId);
            if(!is_numeric($eventId))
            {
                echo 'Wrong EventId';
            }
            else{
                
            }
            
            
        }
        
        //require_once '../templates/event/EventPage.php';
        //throw new RouteNotFoundException();

        
    }
}

?>