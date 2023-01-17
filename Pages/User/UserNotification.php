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

$CurrentUser = 0;//Session[User];
$UserId = 1;

$Connected = true;

$UserNotifications = GetUserNotifications(1);
//CreateUser("Insert", "Into", "database@eventmap.com", "MotDePasse", "j'ai pas envie de metrre une description");
?>
<div class="UserNotification" id="UserNotification">
    <div class="UpUserNotification">
        <h3>Vos notifications</h3>
    </div>
    <div class="MiddleUserNotification">
        <?php 
            if($Connected)
            {
                foreach($UserNotifications as $value => $UserNotification)
                {   
        ?>
        <div class="UserNotificationContent">
            <div class="UserNotificationSender">
                <img height="32" width="32" src="Images/Users/Avatars/default/DefaultAvatar.png" />
                <span><?= GetNotificationSender($UserNotification->NotificationSender) ?></span>
            </div>
            <p><?= GetNotificationContext($UserNotification->NotificationContext);?></p>
        </div>
        <?php
            // close if and foreach
                }
            }
            else
            {
        ?>
        <p>VOUS N'ETES PAS CONNECTE</p>
        <?php
            }  
        ?>
    </div>
    <div class="DownUserNotification">

    </div>
</div> 