<?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST') 
   {
       echo 'test';
       if(isset($_POST['submit'])) 
       {
           $UserId = $_POST['UserId'];
           $UserWarnedStartDate = $_POST['StartDate'];
           $UserWarnedEndDate = $_POST['EndDate'];
           $UserWarnedContext = $_POST['Comment'];
  
           if(!isset($UserId) || !isset($UserWarnedStartDate) || !isset($UserWarnedEndDate) || !isset($UserWarnedContext)) 
           {
             // Tous les champs sont obligatoires
             $message = "Certains champs ne sont pas remplis";
             $error = true;
           }else 
           {
               $url = 'http://localhost/EventMap/API/userwarned/create.php';
               $payload = array(
                   'UserId' => $UserId,
                   'StartDate' => $UserWarnedStartDate,
                   'EndDate' => $UserWarnedEndDate,
                   'Comment' => $UserWarnedContext,
               );
   
               $token = GenerateToken($payload);
               $result = SendRequestToAPI($token, $url);
               
               if (!$result) 
               {
                 $message="Impossible de créer votre warn";
                 require_once '../components/user/UserInputError.php';
               }
           }
       }  
   }
   require_once '../Pages/Admin/Warn/WarnedUser.php';
   // require '../Pages/Admin/Warn/listeWarn.php';
?> 