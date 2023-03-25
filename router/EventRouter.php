<?php

class EventRouter
{
    public function resolve()
    {
        echo 'test';
        //$eventId = explode("/",$_SERVER['REQUEST_URI'])[2];
        //$eventId = 0;
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            call_user_func_array([new eventController(), "wrongEventPagePath"], []);
        }
        else{
            $eventId = explode("/",$_SERVER['REQUEST_URI'])[2];
            var_dump($eventId);
            if(!is_numeric($eventId))
            {
                call_user_func_array([new eventController(), "wrongEventPagePath"], []);
            }
            else{
                //Generate token and send request to api to know if the event exist
                $url = "http://localhost/EventMap/API/event/readSingle.php?EventId=" . $eventId;
                $token = GenerateToken([]);
                $event = SendRequestToAPI($token, $url);


                if($event){ 
                    call_user_func_array([new eventController(), "eventPage"], []);               
                }
                else{
                    call_user_func_array([new eventController(), "eventPageNotFound"], []);
                }
                
            }       
        }    
    }
}

?>