<?php
    session_start();
    session_unset();
    session_destroy();
    require_once $_SERVER['DOCUMENT_ROOT']."/functions.php";
    redirect('login.php');
    die();
?>