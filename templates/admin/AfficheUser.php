<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    if(isset($_POST['create'])) 
    {
       
        $url = 'http://localhost/EventMap/API/admin/create.php';
        $payload = array(
            'UserId' => $_POST['create'],
            'AdminStartDate' => date("d-m-Y"),
            'AdminEndDate' => date('Y-m-d', strtotime(date("d-m-Y") . ' + ' . 6 . ' months'))
        );
        $token = GenerateToken($payload);
        $result = SendRequestToAPI($token, $url);

        if (!$result) 
        {
            $message="Impossible d'ajouter un Admin'";
            require_once '../components/user/UserInputError.php';
        }
    }
    else if(isset($_POST['delete'])) 
    {
        $url = 'http://localhost/EventMap/API/user/delete.php';
        $payload = array(
            'AdminId' => $AdminId
        );
        $token = GenerateToken($payload);
        $result = SendRequestToAPI($token, $url);

        if (!$result) 
        {
            $message="Impossible de supprimer un utilisateur'";
            require_once '../components/user/UserInputError.php';
        }
    }
}
require '../Pages/admin/listeUser.php';
?>