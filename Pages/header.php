<!DOCTYPE html>
<html lang="en" >
  <head>
  <link rel="stylesheet" href="../css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTMAP</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  </head>
  <body>
    <div class=menu>
        <img class=logo src="images/EVENTMAP.png" alt="logo">
        <h1 class=menuH1>EVENTMAP</h1>
        <ul>
          <?php if(!isset($_SESSION['user'])) : ?>
            <div class=box-menu>
              <a href="/my-app/EVENTMAP/index.php?/pages/register.php">S'inscrire</a>
            </div>
            <div class=box-menu>
              <a href="/my-app/EVENTMAP/index.php?/pages/login/login.php">Se Connecter</a>
            </div>
          <?php else : ?>
            <?php if($_SESSION['user']->role=="admin") : ?>
              <a href="/my-app/EVENTMAP/index.php?/pages/admin.php">Admin</a>
            <?php endif?>
          <?php endif ?>
        </ul>
    </div>
  <form id="traiteOrion" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">