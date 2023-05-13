<link href= "\css\UserProfile.css" rel="stylesheet">
<div class="event-profil">
  <div class="banner">
    <img src="<?= "/" . $user->UserBackgroundDir ?>" alt="Image de bannière">
    <h1><?= $user->UserFirstName   . " " . $user->UserName?></h1>
    <button id="button-modify-profile" class="profile-edit-button">Modifier le profil</button>
  </div>
  <div class="description">
    <p><?= $user->UserDescription ?></p>
  </div>
  <h2>Événements créés</h2>
  <div class="event-list">
        <?php require_once "../templates/user/profile/UserProfileEventCreated.php"; ?>
  </div>
  <h2>Événements rejoins</h2>
  <div class="event-list">
    <?php require_once "../templates/user/profile/UserProfileEventJoined.php"; ?>
  </div>
</div>
<script src="/js/UserProfile.js"></script>