<?php
  ini_set("max_execution_time", 0);
  require_once 'Pages/Tools/Requestes.php';
  require_once 'Pages/Tools/Functions.php';
  session_start();
  //session_destroy();



  $user = null;
  if(isset($_SESSION['user']))
  {
    $_SESSION['user'] = json_decode(file_get_contents('http://localhost/EventMap/API/user/readSingle.php?UserId=' . $_SESSION['user']->UserId));
    $user = $_SESSION['user'];
  }
  
  $uri = $_SERVER['REQUEST_URI'];
  if($uri === "/EventMap" || $uri === "/EventMap/" || $uri === "/EventMap/?"){
    header("location:/EventMap?/");
  }

  $page = "";
  
  require_once 'Pages/Tools/Connection.php';

  switch($uri){
    case ($uri === "/EventMap/?/"):
      $page .=  "MainPageTest.php";
      break;
    
    case ($uri === "/EventMap/?/Login"):
      if($user)
      {
        header("location:/EventMap/?/Connected");
        break;
      }
      $page .= "templates/Login.php";
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
  <?php 
    require_once 'components/Header.php';
  ?>
  <body>
    <?php
    if(!$user || $uri != "/EventMap/?/Login"){
      require_once 'Pages/Utils/PopUpLogin.php';
      //require_once 'Pages/Admin/AdminPanel.php';
      //CreateImageDir("/Images/Events/Background/artfgg", "");
    }

    ?>
        <?php 
          require_once 'templates/NavBar.php'; 
          
        ?>
    <div id="MasterContent" >
        <?php
        //$rees =  file_get_contents('http://localhost/EventMap/API/event/read.php');
        //echo $rees;
        require_once "templates/login.php";

        require_once "Pages/Utils/newfooter.php";
        //require_once 'Pages/User/UserProfile.php';
        ?>
    </div>

  </body>


</html>