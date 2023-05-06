<div class="event-card">

    <?php require "../templates/user/UserProfileEventCardThumbnail.php"; ?>
    <div class="overlay">
        <h2><?= $Event->Name ?></h2>
        <p class="price"><?= $Event->Price ?>€</p>
        <p class="date"><?= $date ?></p>
    </div>
</div>