<?php

  require_once 'Pages/Tools/Requestes.php';
  require_once 'Pages/Tools/Functions.php';
  session_start();

  $user = null;
  if(isset($_SESSION['user']))
  {
    $user = $_SESSION['user'];
  }
  
  $uri = $_SERVER['REQUEST_URI'];
  if($uri === "/EventMap" || $uri === "/EventMap/" || $uri === "/EventMap/?"){
    header("location:/EventMap?/");
  }

  $page = "Pages/Views/";
  
  require_once 'Pages/Tools/Connection.php';

  switch($uri){
    case ($uri === "/EventMap/?/"):
      $page .=  "MainPageTest.php";
      break;
    
    case ($uri === "/EventMap/?/Login"):
      if($user)
      {
        header("location:/EventMap?/");
        break;
      }
      $page .= "Login.php";
      break;

    case ($uri === "/EventMap/?/Register"):
      if($user)
      {
        header("location:/EventMap?/");
      }
      $page .= "Register.php";
      break;

    case ($uri === "/EventMap/?/Map"):
      $page .= "Maps.php";
      break;

    case ($uri === "/EventMap/?/Event"):
      $page .= "MainPageTest.php";
      break;

    case ($uri === "/EventMap/?/registerEvent"):
      $page .= "registerEvent.php";
      break;

    case($uri === "/EventMap/?/UserProfile"):
      $page .= "UserProfile.php";
      break;

      default:

      // 404 cannot find the required page
      $page .=  "Error404.php";
      break;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <title>EventMap</title>
    <link rel="icon" href="Images/Logos/EventMap.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@800&display=swap" rel="stylesheet">
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous">
    </script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
  </head>
  <meta charset="utf-8">
  <script src="js/script.js">
    </script> 
  <body>
  <div id="timer">00:00:00</div>
    <script>
      // Durée du timer en secondes
      var duration = 3600;
      
      // Mise à jour de l'affichage du timer toutes les secondes
      setInterval(function() {
        // Réduction de la durée restante de 1 seconde
        duration--;
        
        // Calcul des heures, minutes et secondes restantes
        var hours = Math.floor(duration / 3600);
        var minutes = Math.floor((duration % 3600) / 60);
        var seconds = duration % 60;
        
        // Mise à jour de l'élément div avec la durée restante au format hh:mm:ss
        document.getElementById("timer").innerHTML = 
          (hours < 10 ? "0" + hours : hours) + ":" +
          (minutes < 10 ? "0" + minutes : minutes) + ":" +
          (seconds < 10 ? "0" + seconds : seconds);
      }, 1000);
    </script>
    <?php
    if(!$user || $uri != "/EventMap/?/Login"){
      require_once 'Pages/Utils/PopUpLogin.php';
      //require_once 'Pages/Admin/AdminPanel.php';
      //CreateImageDir("/Images/Events/Background/artfgg", "");
    }

    ?>
        <?php 
          require_once 'Pages/Utils/NewNavBar.php'; 
          
        ?>
    <div id="MasterContent" >
        <?php
        require_once $page;

        require_once "Pages/Utils/newfooter.php";
        //require_once 'Pages/User/UserProfile.php';
        ?>
    </div>

  </body>


</html>