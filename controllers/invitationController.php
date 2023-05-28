<?php
    class invitationController
    {
        public function invitation($NotificationId){
            $url= "http://localhost/EventMap/API/notification/readSingle.php";
            $payload = [
                'NotificationId' => $NotificationId
            ];
            $token = GenerateToken($payload);
        
            $notification = SendRequestToAPI($token, $url);

            if($notification->Status === "not read yet"){
                require_once '../templates/invitation/invitationEvent.php';
            }
            else{
                header("Location: /");
            }


        }

        public function InvitationNotFound(){
            header("Location: /");
        }
    }

    


?>