<?php
    class invitationController
    {
        public function invitation($NotificationId){
           require_once '../templates/invitation/invitationEvent.php';
        }

        public function InvitationNotFound(){
            header("Location: /");
        }
    }

    


?>