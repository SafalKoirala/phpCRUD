<?php
    require_once 'dbconn.php';
   // require_once 'auth.php';
?>
<html>
    <head>
        <title>DELETE</title>
    </head>
    <body>
        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){

                $id=$_GET['id'] ;
                $query="DELETE FROM  users WHERE id=:id";
                $stmt=$pdo->prepare($query);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                echo '<h2> RECORD DELETED</h2>';
            }
            else{
                echo '<h2>No record specified to delete</h2>';

            }
            echo "<a href='index.php'>VIEW RECORDS</a>";
            ?>
            

    </body>
</html>