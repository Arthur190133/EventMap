<?php

  require_once 'Pages/Tools/Requestes.php';
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
    
    case ($uri === "/EventMap/?/login"):
      $page .= "Login.php";
      break;

    case ($uri === "/EventMap/?/register"):
      $page .= "Register.php";
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
    <title>EventMap</title>
    <link rel="icon" href="Images/Logos/EventMap.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
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

      <div class="RightContent"> 
        <?php
        require_once $page;
        ?>
    </div>

  </body>


</html>