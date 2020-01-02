<?php 
require_once "dbconn.php";
if(isset($_SESSION['logged_user']))
{
    $_SESSION['logged_user']=null;
    unset($_SESSION['logged_user']); //either one is ok
}
header('Location:index.php');
?>