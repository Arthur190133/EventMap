
<?php
  // Démarre la mise en tampon de sortie
  ob_start();

  require_once '../API/JWT.php';
  require_once '../Pages/Tools/Functions.php';
  session_start();

  // Update user session
  $user = null;
  $admin = null;


  if(isset($_SESSION['user']))
  {
    $token = GenerateToken([]);
    $_SESSION['user'] = SendRequestToAPI($token, ('http://localhost/EventMap/API/user/readSingle.php?UserId=' . $_SESSION['user']->UserId));
    if($_SESSION['user']){
      $user = $_SESSION['user'];
      // get admin
      $url = "http://localhost/EventMap/API/admin/IsAdmin.php";
      $payload = ['UserId' => $user->UserId];
      $token = GenerateToken($payload);
      $admin = SendRequestToAPI($token, $url);
    }else{
      echo 'Failed to load user session';
    }
    
  }
////////////////////////////////
      /*CREATE ROUTER*/
////////////////////////////////

require_once '../router/Router.php';
require_once '../controllers/mainController.php';
require_once '../Exceptions/RouteNotFoundException.php';

$router = new Router();

$uri = explode("/",$_SERVER['REQUEST_URI'])[1];
$router->register('/' . $uri, ['mainController', $uri]);
$router->register('/', ['mainController', 'index']);

?>

<!DOCTYPE html>
<html>
<?php 
    require_once '../components/Header.php';
    require_once '../templates/NavBar.php'; 
 ?>
  <body class="fade-in">
    <div id="MasterContent" >
      <?php
      try{
        $router->resolve($uri);

      }catch (RouteNotFoundException $e){
        $e->getMessage();
      }
        ?>
    </div>
  </body>
    <script src="/js/script.js"></script>
  </html>
  <?php
    // Vide le tampon de sortie et arrête la mise en tampon
    ob_end_flush();
  ?>