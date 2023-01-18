<?php
/* User

        !!UserName vous à invitez à rejoindre un évènement.     --> Lien vers une page d'invitation

   Event
    
        !!UserName à rejoind votre évènement(EventName).                                             --> Lien vers l'évènement 
        !!Votre évènement va bientôt commencer (EventName).  15 minutes avant le commencenment       --> Lien vers l'évènement 
        !!Votre évènement commence (EventName).                                                      --> Lien vers l'évènement 
        !!Votre évènement va bientôt se terminer (EventName). 15 Minutes avant la fin.               --> Lien vers l'évènement 
        !!Votre évènement est terminer (EventName), vous avez désormais acces à sa vue d'ensemble.   --> Lien vers l'évènement 
        !!EventName à été dissous.                                                                   --> Lien vers la page des évènements
        !!Vous avez été exclu de (EventName).

*/



$Connected = $user;

$UserNotifications = GetUserNotifications(1);
//CreateUser("Insert", "Into", "database@eventmap.com", "MotDePasse", "j'ai pas envie de metrre une description");

require_once 'components/Notification.php';
?>
