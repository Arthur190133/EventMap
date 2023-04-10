<?php

class UserProfileRouter
{
    public function resolve()
    {
        if(!isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            //if there is no id load the current user profile
            $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $_SESSION['user']->UserId;
            $token = GenerateToken([]);
            $user = SendRequestToAPI($token, $url);
            call_user_func_array([new userProfileController(), "loadSelfPage"], ['user' => $user]);
        }
        else{
            $userId = explode("/",$_SERVER['REQUEST_URI'])[2];
            if(!is_numeric($userId))
            {
                if(empty($userId)){
                    //if there is no id load the current user profile
                    $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $_SESSION['user']->UserId;
                    $token = GenerateToken([]);
                    $user = SendRequestToAPI($token, $url);
                    call_user_func_array([new userProfileController(), "loadSelfPage"], ['user' => $user]);
                }
                else{
                    call_user_func_array([new userProfileController(), "wrongUserProfilePagePath"], []);
                }

            }
            else{           
                //Generate token and send request to api to know if the event exist
                $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $userId;
                $token = GenerateToken([]);
                $user = SendRequestToAPI($token, $url);
                if($user){ 
                    call_user_func_array([new userProfileController(), "userProfilePage"], ['user' => $user]);               
                }
                else{
                    call_user_func_array([new userProfileController(), "userProfilePageNotFound"], []);
                }
            }     
        }
    }
}

?>