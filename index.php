<?php
  require_once 'Pages/Tools/Requestes.php';
  require_once 'Pages/Tools/Functions.php';
  session_start();



  $user = null;
  if(isset($_SESSION['user']))
  {
    $_SESSION['user'] = json_decode(file_get_contents('http://localhost/EventMap/API/user/readSingle.php?UserId=' . $_SESSION['user']->UserId));
    $user = $_SESSION['user'];
    //var_dump($user);
  }
  


  require_once 'root/user/userRoot.php';
  
  require_once 'Pages/Tools/Connection.php';


?>

<!DOCTYPE html>
<html>
  <?php 
    require_once 'components/Header.php';
  ?>
  <body class="fade-in">
    <?php
      require_once 'templates/PopUpLogin.php';
    ?>
        <?php 
          require_once 'templates/NavBar.php'; 
          
        ?>
    <div id="MasterContent" >
        <?php
       // $rees =  file_get_contents('http://localhost/EventMap/API/event/readCards.php');
       // echo $rees;

echo 'Current PHP version: ' . phpversion();
        require_once $page;

        //require_once "Pages/Utils/newfooter.php";
        //require_once 'Pages/User/UserProfile.php';
        ?>
    </div>

  </body>

  <script src="js/script.js"></script>
  
  </html>