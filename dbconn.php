<?php
session_start();
$host="localhost"; //127.0.0.1
$db="php_experiment";
$user="root";
$pass="";
//charset ="UTF8"; charset to be defined 
$dsn="mysql:host=$host;dbname=$db";
$pdo =new PDO($dsn,$user,$pass); //PDO=php document object (database connect garna use gareko)

if(!isset($_SESSION['logged_user'])|| empty($_SESSION['logged_user']))
{
    echo '
    <div align="right">
        <a href="login.php">LOGIN</a>
     </div>
     ';
}
else
{
    echo'
    <div align="right">
    <a href="logout.php">LOGOUT</a>
 </div>
 ';

}
?>