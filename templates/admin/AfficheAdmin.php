<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if(isset($_POST['delete'])) 
    {
        
        $url = 'http://localhost/EventMap/API/admin/delete.php';
        $payload = array(
            'UserId' => $_POST['delete']
        );
        $token = GenerateToken($payload);
        $result = SendRequestToAPI($token, $url);
        
        if (!$result) 
        {
            $message="Impossible de supprimer un Admin'";
            require_once '../components/user/UserInputError.php';
        }
    }
}
require '../Pages/Admin/listeAdmin.php';
?>