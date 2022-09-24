<?php
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

    default:
      // 404
      $page .=  "Error404.php";
      break;
  }


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
  <script src="js/script.js">
    </script> 
  <body>
    <?php
    require_once 'Pages/Utils/PopUpLogin.php';
    ?>
    <div id="MasterContent">
      <div class="NavBarContent">
        <?php 
          require_once 'Pages/Utils/NavBar.php'; 
        ?>
      </div>
      <div class="RightContent"> 
        <?php
        require_once $page;
        ?>
    </div>

  </body>


</html>