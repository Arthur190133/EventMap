<?php

class UserProfileRouter
{
    public function resolve()
    {
        echo explode("/",$_SERVER['REQUEST_URI'])[2];
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            call_user_func_array([new userProfileController(), "wrongUserProfilePagePath"], []);
        }
        else{
            $userId = explode("/",$_SERVER['REQUEST_URI'])[2];
            if(!is_numeric($userId))
            {
                call_user_func_array([new userProfileController(), "wrongUserProfilePagePath"], []);
            }
            else{
                //Generate token and send request to api to know if the event exist
                $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $userId;
                $token = GenerateToken([]);
                $event = SendRequestToAPI($token, $url);


                if($event){ 
                    call_user_func_array([new userProfileController(), "userProfilePage"], []);               
                }
                else{
                    call_user_func_array([new userProfileController(), "userProfilePageNotFound"], []);
                }
                
            }       
        }    
    }
}

?>