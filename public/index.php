
<?php

  //require_once '../Pages/Tools/Requestes.php';
  require_once '../Pages/Tools/Functions.php';
  session_start();



  $user = null;
  if(isset($_SESSION['user']))
  {
    $_SESSION['user'] = json_decode(file_get_contents('http://localhost/EventMap/API/user/readSingle.php?UserId=' . $_SESSION['user']->UserId));
    $user = $_SESSION['user'];
    //var_dump($user);
  }
  
  
////////////////////////////////
      /*CREATING ROUTER*/
////////////////////////////////

require_once '../router/Router.php';
require_once '../controllers/mainController.php';
require_once '../Exceptions/RouteNotFoundException.php';

$router = new Router();

$router->register('/', ['mainController', 'index']);
$router->register('/user-profile', ['mainController', 'userProfile']);
$router->register('/events', ['mainController', 'events']);
$router->register('/login', ['mainController', 'login']);



/* $router->register('/contact', function(){
  return 'ContactPage';
});*/






  //require_once '../route/mainRoute.php';
  
  require_once '../Pages/Tools/Connection.php';


?>

<!DOCTYPE html>
<html>
<?php 
        require_once '../components/Header.php';
          require_once '../templates/NavBar.php'; 
          
        ?>
  <?php 
    try{
      $router->resolve($_SERVER['REQUEST_URI']);
  
  }catch (RouteNotFoundException $e){
      $e->getMessage();
  }
  ?>
  <body class="fade-in">
    <?php
      //require_once '../templates/PopUpLogin.php';
    ?>

    <div id="MasterContent" >
        <?php
       // $rees =  file_get_contents('http://localhost/EventMap/API/event/readCards.php');
       // echo $rees;

echo 'Current PHP version: ' . phpversion();
        //require_once $page;

        //require_once "Pages/Utils/newfooter.php";
        //require_once 'Pages/User/UserProfile.php';
        ?>
    </div>

  </body>

   <script src="js/script.js"></script>
  
  </html>