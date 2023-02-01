<?php


$uri = $_SERVER['REQUEST_URI'];
if($uri === "/EventMap" || $uri === "/EventMap/" || $uri === "/EventMap/?"){
  header("location:/EventMap/?/");
}

$page = "../";

switch($uri){
    case ($uri === "/EventMap/?/"):
      $page .=  "Pages/views/MainPageTest.php";
      break;
    
    case ($uri === "/EventMap/?/Login"):
      if($user)
      {
        header("location:/EventMap/?/");
        break;
      }
      $page .= "templates/Login.php";
      break;

    case ($uri === "/EventMap/?/Register"):
      if($user)
      {
        header("location:/EventMap?/");
      }
      $page .= "templates/Register.php";
      break;

    case ($uri === "/EventMap/?/Map"):
      $page .= "Pages/views/Maps.php";
      break;

    case ($uri ===  "/EventMap/?/Event"):
      $page .= "templates/event/Events.php";
      break;

    case ($uri === "/EventMap/?/registerEvent"):
      $page .= "registerEvent.php";
      break;

    case($uri === "/EventMap/?/UserProfile"):
      $page .= "templates/user/UserProfile.php";
      break;
    case($uri === "/EventMap/?/Logout"):
      session_destroy();
      header("location: /EventMap/?/");
      break;
      default:

      // 404 cannot find the required page
      $page .=  "Pages/Views/Error404.php";
      break;
  }

  

?>