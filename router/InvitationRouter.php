<?php

class InvitationRouter
{
    public function resolve()
    {
        if(isset(explode("/",$_SERVER['REQUEST_URI'])[2]))
        {
            $notificationId = explode("/",$_SERVER['REQUEST_URI'])[2];
            if(!is_numeric($notificationId))
            {
                call_user_func_array([new invitationController(), "wrongPath"], []);
            }

            else
            {           
                //Generate token and send request to api to know if the user exist
                $url = "http://localhost/EventMap/API/notification/readSingle.php";
                $payload = [
                    "NotificationId" => $notificationId,
                ];
                $token = GenerateToken($payload);
                $notification = SendRequestToAPI($token, $url);
                
                var_dump($notification->Context === "Vous");
                if($notification && str_contains($notification->Context, "invitation")) { 
                    call_user_func_array([new invitationController(), "Invitation"], ['NotificationId' => $notificationId]);               
                }
                else{
                    call_user_func_array([new invitationController(), "InvitationNotFound"], []);
                }
            }  
        }
    }
}
?>