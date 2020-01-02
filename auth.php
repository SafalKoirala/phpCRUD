<?php
    if(!isset($_SESSION['logged_user']) || empty($_SESSION['logged_user'])){
        header('location:login.php'); // !GO(redirect) to login.php
    }