<?php
    require_once "dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>
<body>
<a href="index.php">VIEW RECORDS</a>
<?php
$logged=false;//flag banako
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpassword'];
    $password=md5($pass);

    $query="SELECT * FROM users WHERE email=:email AND password=:pwd";
    $stmt =$pdo->prepare($query);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':pwd',$password);
    $stmt->execute();
     $user=$stmt->fetch();
     if(!empty($user)){
        $logged =true;
        $_SESSION['logged_user']=$user;
        echo'<h2>USER logged in successfully </h2>';
     }
     else
     {
         echo '<h2>INVALID LOGIN</h2>';
     }
}

if(!$logged) {
?>
<form  id="myform" name="myform" method="post" action="login.php">
    <h3>LOGIN TO THE SYSTEM</h3>
    <table>
        <tr>
        <td>EMAIL</td>
        <td><input type="text" id="txtemail" name="txtemail"/></td>
        </tr>
        <tr>
        <td>PASSWORD</td>
        <td><input type="password" id="txtpassword" name="txtpassword"></td> 
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td><input type="submit"></td>
        </tr>
    </table>
</form>
<?php }  ?>   
</body>
</html>