<div class="event-card">

    <?php require "../templates/user/profile/UserProfileEventCardThumbnail.php"; ?>
    <div class="overlay">
        <h2><?= $Event->Name ?></h2>
        <p class="price"><?= $Event->Price ?>€</p>
        <p class="date"><?= $date ?></p>
    </div>
</div>