
<?php
  // Démarre la mise en tampon de sortie
  ob_start();

  require_once '../API/JWT.php';
  require_once '../Pages/Tools/Functions.php';
  session_start();



  // Update user session
  $user = null;


  if(isset($_SESSION['user']))
  {
    $token = GenerateToken([]);
    $_SESSION['user'] = SendRequestToAPI($token, ('http://localhost/EventMap/API/user/readSingle.php?UserId=' . $_SESSION['user']->UserId));
    if($_SESSION['user']){
      $user = $_SESSION['user'];
    }else{
      echo 'Failed to load user session';
    }
    
  }
  
  
////////////////////////////////
      /*CREATING ROUTER*/
////////////////////////////////

require_once '../router/Router.php';
require_once '../controllers/mainController.php';
require_once '../Exceptions/RouteNotFoundException.php';




$router = new Router();

$uri = explode("/",$_SERVER['REQUEST_URI'])[1];
$router->register('/' . $uri, ['mainController', $uri]);
$router->register('/', ['mainController', 'index']);







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
      // LOAD CURRENT PAGE
      try{
        $test = $user;
        $router->resolve($uri);

      }catch (RouteNotFoundException $e){
        $e->getMessage();
      }

        //require_once "Pages/Utils/newfooter.php";
        //require_once 'Pages/User/UserProfile.php';
        ?>
    </div>

  </body>

   <script src="/js/script.js"></script>
  
  </html>

  <?php
    // Vide le tampon de sortie et arrête la mise en tampon
  ob_end_flush();
  ?>