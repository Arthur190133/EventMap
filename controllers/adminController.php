<?php

class adminController
{
    public function admin(){
        require_once '../templates/Admin/Admin.php';
    }
    public function ApiDebugTool(){
        require_once '../templates/Admin/apidebug.php';
    }

    public function adminPage(){
        require_once "../templates/Admin/AdminPage.php";
    }
    
    public function UserWarned(){
        require_once "../templates/Admin/Warn/UserWarned.php";
    }

}

?>