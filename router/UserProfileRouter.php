<?php

class UserProfileRouter
{
    public function resolve()
    {
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            //if there is no id load the current user profile
            call_user_func_array([new userProfileController(), "loadSelfPage"], []);
        }
        else{
            $userId = explode("/",$_SERVER['REQUEST_URI'])[2];
            if(!is_numeric($userId))
            {
                if(empty($userId)){
                    call_user_func_array([new userProfileController(), "loadSelfPage"], []);
                }
                else{
                    call_user_func_array([new userProfileController(), "wrongUserProfilePagePath"], []);
                }

            }
            else{           
                //Generate token and send request to api to know if the user exist
                $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $userId;
                $token = GenerateToken([]);
                $user = SendRequestToAPI($token, $url);
                if($user){ 
                    call_user_func_array([new userProfileController(), "userProfilePage"], ['userId' => $userId]);               
                }
                else{
                    call_user_func_array([new userProfileController(), "userProfilePageNotFound"], []);
                }
            }     
        }
    }
}

?>