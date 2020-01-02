<?php
require_once"dbconn.php";
?>
<html>
    <head>
        <title></title>
        <?php if($_SERVER['REQUEST_METHOD']!='POST') { ?>


        <?php }?>
    </head>
    <body>
            <a href="index.php">View Records</a>
        <?php 
            
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['txtname'];
                $email=$_POST['txtemail'];
                $pass=$_POST['txtpassword'];

                $password=md5($pass);

                $query = "INSERT INTO users(fullname, email, password)
                        VALUES(:name, :email, :pwd)";
                $stmt=$pdo->prepare($query);
                $stmt->bindParam(':name',$name);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':pwd',$password);

                $stmt->execute();
                echo '<h2>User added successfuly</h2>';
            } else{ 
                ?> 
        <form id="myform" name="myform" method="post" action="add.php" >
            <h2>ADD New Record</h2>
            <table>
                <tr>
                    <td>Name</td>  
                    <td><input type="text" id="txtname" name="txtname"/></td>   
                </tr>
                <tr>
                    <td>Email</td>  
                    <td><input type="text" id="txtemail" name="txtemail"/></td>
                </tr>
                <tr>
                    <td>Password</td>  
                    <td><input type="password" id="txtpassword" name="txtpassword"/></td>
                </tr>
                          
                <tr>
                    <td>&nbsp;</td>   <!-- euta white space-->
                    <td><input type="submit"/></td>
                </tr>
            </table>
        </form>
            <?php } ?>    



    </body>

</html>