<?php
  require_once 'Pages/Tools/Connection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/AdaptiveStyle.php">
  </head>
  <meta charset="utf-8">
  <body>
    <?php //
            //require_once 'Pages/Utils/NavBar.php';
            require_once 'Pages/Utils/PopUpLogin.php';
            //require_once 'Pages/User/UserProfile.php';
            require_once 'Pages/Event/EventCard.php';
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
          <div>
            <button class ="EventButtonCard" onclick="FocusOnMarker(this)" id="EventButtonCard" value="0">
              <div>
                <span class="EventButtonCardEventType">Special event</span>
                <h1>E420</h1>
                <span class ="EventButtonCardDate">19/08/23 19:00 - 20/08/2023 01:00</span>
              </div>
            </button>
            <button class ="EventButtonCard" onclick="FocusOnMarker(this)" id="EventButtonCard" value="1">
              <div>
                <span class="EventButtonCardEventType">Original event</span>
                <h1>Bruxelles Nord</h1>
                <span class ="EventButtonCardDate">29/12/22 19:00 - 20/08/2023 01:00</span>
              </div>
            </button>
            <button class ="EventButtonCard" onclick="FocusOnMarker(this)" id="EventButtonCard" value="2">
              <div>
                <span class="EventButtonCardEventType">Special event</span>
                <h1>Bruxelles, E420</h1>
                <span class ="EventButtonCardDate">19/08/22 19:00 - 20/08/2023 01:00</span>
              </div>
            </button>
            <div id="Event">
            </div>
            <div id="ErrorContent">
            </div>
          </div>
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