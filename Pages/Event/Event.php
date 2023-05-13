<link href= "/css/eventUserJoined.css" rel="stylesheet">
<div>
    <h1> <?= $event->Name ?> </h1>
    <p>
        <span>
            description : 
        </span>
         <?= $event->Description ?> 
    </p>
    <h3>EVENT DATE : </h3>
    <p><?= $event->StartDate . ' - ' . $event->EndDate ?></p>
    <img height="128" width="128" src="<?= '/' . $event->ThumbnailDir ?>"/>
    <button><?= $JoinableEvent ?></button>

    <div>
        <h1>EVENT OWNER</h1>
        <?php require '../templates/user/ProfileLink.php'; ?>
    </div>
    <div class="event">
        <h1><?= $event->Name ?></h1>
    </div>
    <div class="event-users-joinded">
        <h1>UTILISATEURS AYANT REJOINDS L'EVENEMENT</h1>
        <?php require_once '../templates/event/EventUserJoined.php'; ?>
    </div>
    <div class="event-chat">
       <?php  require_once '../templates/event/chat/EventChat.php'; ?>
    </div>

</div>