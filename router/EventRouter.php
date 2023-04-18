<?php

class EventRouter
{
    public function resolve()
    {
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            call_user_func_array([new eventController(), "wrongEventPagePath"], []);
        }
        else{
            $eventId = explode("/",$_SERVER['REQUEST_URI'])[2];
            //var_dump($eventId);
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
                    // passer event en référence pour pouvoir y acceder dans la page event.php
                    call_user_func_array([new eventController(), "eventPage"], ['event' => $event]);               
                }
                else{
                    call_user_func_array([new eventController(), "eventPageNotFound"], []);
                }
                
            }       
        }    
    }
}

?>