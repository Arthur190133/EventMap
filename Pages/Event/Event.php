<div>
    <h1> <?= $event->Name ?> </h1>
    <p>
        <span>
            description : 
        </span>
         <?= $event->Description ?> 
    </p>
    <img height="128" width="128" src="<?= '/' . $event->ThumbnailDir ?>"/>

</div>