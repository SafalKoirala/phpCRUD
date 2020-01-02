<?php
require_once('dbconn.php');
require_once('auth.php');

?>
<html>
    <head>
        <title>INDEX PAGE</title>
    </head>
    <body>
        <?php 
            $query="SELECT * FROM users";
            $stmt=$pdo->prepare($query); //pdo dbconn ma xa  yo instant ho,stmt varaiable ho 
            $stmt->execute();
            $users = $stmt->fetchAll();

        
        ?>
        <a href="add.php">ADD DATA</a>
       
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach($users as $row) {?>
                 <tr>
                        <td><?php echo $row['fullname'];?></td>
                        <td> <?php echo $row['email'];?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id'];?>">Delete</a> <!-- kun id delete garni tyo id delete.php ma purako-->
                            <a href="update.php?id=<?php echo $row['id'];?>">Update</a>
                        </td>
                </tr>
            <?php } ?>
        </table>

    </body>

</html>