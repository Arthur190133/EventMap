<?php

class adminController
{
    public function admin(){
        require_once '../templates/Admin/Admin.php';
    }
    public function ApiDebugTool(){
        require_once '../templates/Admin/apidebug.php';
    }


}

?>