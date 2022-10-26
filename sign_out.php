<?php 
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    setcookie('remember_login',null,-1);
    header('location:index.php');