<?php
session_start();

if((isset($_COOKIE['username']))){
    $_COOKIE['username']=$_SESSION['username'];
}

if(!(isset($_SESSION['username']))){
    header('Location: login.php');
}

?>