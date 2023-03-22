<a href="/ToBeDefined" class="link">
    <div class="UserNotificationContent">
        <img height="32" width="32" src="<?= "/" . $Sender['SenderImage'] ?>" />
        <div class="UserNotificationSender">
            <div class="UserNotificationSenderHeader">
                <p class="NotificationSender"><?= $Sender['SenderName']  ?></p>
                <span><?= $Date ?></span>
            </div>
            <p class="NotificationContext"><?=  $Context ?></p>
        </div>
    </div>
</a>