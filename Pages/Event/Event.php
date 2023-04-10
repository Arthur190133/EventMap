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

    </div>
    <div class="event-chat">

    </div>

</div>