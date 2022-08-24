<?php
  session_start();

  $url = $_SERVER['REQUEST_URI'];

  require_once 'Pages/Tools/Connection.php';

  if($url =! "localhost/EventMap/"){
    ?>
    <script> windows.location = "localhost/EventMap/" </script>
    <?php
  }
  var_dump($url);


?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/AdaptiveStyle.php">
    <title>EventMap</title>
    <link rel="icon" href="Images/Logos/EventMap.png">
  </head>
  <meta charset="utf-8">
  <body>
    <?php 
            //require_once 'Pages/Utils/NavBar.php';
            //require_once 'Pages/Utils/PopUpLogin.php';
            //require_once 'Pages/User/UserProfile.php';
            
    ?>

    <div id="MasterContent">
      <div class="NavBarContent">
        <?php 
          require_once 'Pages/Utils/NavBar.php'; 
         // require_once 'Pages/User/UserProfile.php';
        ?>
      </div>
      <div class="RightContent"> 
        <div id="map">
          <h1 class="mapTitle">Google Map</h1>
        </div>
        <div class ="EventButtons">
            <?php 
              require 'Pages/Event/EventCard.php';
              require 'Pages/Event/EventCard.php';
              require 'Pages/Event/EventCard.php';
              require 'Pages/Event/EventCard.php';
              //require_once 'Pages/Invitations/InvitationEmail.php';
              ?>
        </div>
        <div id="Event">
        </div>
        <div id="ErrorContent">
        </div>
      </div>
    </div>

    <script src="js/script.js">
    </script> 
       
       <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfBI13bMmYnsfUqPOZR4gR2eYzH5ZK8rI&map_ids=61d9f0e6c1783a33&callback=initMap">
          </script>
  </body>


</html>