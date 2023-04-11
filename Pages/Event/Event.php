<link href= "/css/eventUserJoined.css" rel="stylesheet">
<div>
    <h1> <?= $event->Name ?> </h1>
    <p>
        <span>
            description : 
        </span>
         <?= $event->Description ?> 
    </p>
    <img height="128" width="128" src="<?= '/' . $event->ThumbnailDir ?>"/>
    <button><?= $JoinableEvent ?></button>


    <div class="event">
        <h1><?= $event->Name ?></h1>
    </div>
    <div class="event-users-joinded">
        <h1>UTILISATEURS AYANT REJOINDS L'EVENEMENT</h1>
        <?php require_once '../templates/event/EventUserJoined.php'; ?>
    </div>
    <div class="event-chat">

    </div>

</div>