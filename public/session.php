<?php

session_start();
if(!isset($_SESSION["is_login"])){
    $message="请登录";
    $url="login.php";
    include "message.html";
    exit;
}

?>