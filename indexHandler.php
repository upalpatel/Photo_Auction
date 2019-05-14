<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        require 'login.php';
    } elseif (isset($_POST['register'])) {

        header("location: register.php");
        //require 'register.php';
    }
}
?>