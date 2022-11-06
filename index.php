<?php

  require_once 'Pages/Tools/Requestes.php';
  require_once 'Pages/Tools/Functions.php';
  session_start();
  
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
      $page .= "Login.php";
      break;

    case ($uri === "/EventMap/?/Register"):
      $page .= "Register.php";
      break;

    case ($uri === "/EventMap/?/Map"):
      $page .= "Maps.php";
      break;

    case ($uri === "/EventMap/?/Event"):
      $page .= "MainPageTest.php";
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
    <title>EventMap</title>
    <link rel="icon" href="Images/Logos/EventMap.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    
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
    <?php
    if($uri !== "/EventMap/?/login"){
     // require_once 'Pages/Utils/PopUpLogin.php';
      //require_once 'Pages/Admin/AdminPanel.php';
      //require_once 'Pages/User/UserProfile.php';
    }

    ?>
        <?php 
          require_once 'Pages/Utils/NewNavBar.php'; 
          
        ?>
    <div id="MasterContent" >
        <?php
        require_once $page;
        ?>
    </div>

  </body>


</html>