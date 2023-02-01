<?php
    if(!($user || $uri === "/EventMap/?/Login" || $uri === "/EventMap/?/Register"))
    {
        require_once '../components/PopUpLogin.php';
    }
?>