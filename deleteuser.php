<html>
 <head>
  <title>PHP Add user</title>
 </head>
 <body>
 <?php 
   require_once "connect.php";

   if ( isset($_POST['user_id']) ) {
       $sql = "DELETE FROM users WHERE user_id = :zip";
       echo ("<pre><br>" .$sql. "<br></pre><br>");
       $stmt = $connect->prepare($sql);
       $stmt->execute(array(':zip'=>$_POST['user_id']));
   }   
 ?> 
    <p>Add a new user</p>
    <form method="post">
        <p>ID to delete:<input type="text" name="user_id" size="5"></p>
        <p><input type="submit" value="Delete user"/></p>
    </form>
    <br>
    <br>


<?php
   $stmt = $connect->query("SELECT * FROM users");
   echo '<table border="1">';
   while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo '<tr><td>';
       echo($row['user_id']);
       echo '</td><td>';
       echo($row['name']);
       echo '</td><td>';
       echo($row['email']);
       echo '</td><td>';
       echo($row['password']);
       echo '</td><td>';
       echo('<form method="post">');
       echo('<input type="hidden" name="user_id" value="'.$row['user_id'].'">');  
       echo('<input type="submit" value="Del" name="delete">');
       echo("<br></form><br>");
       echo('</td></tr>');
   }
   echo('</table>');?>

    <br>
    <br>
    <br>
    <a href="../oop/index.php">Back to index</a>
    <a href="../oop/adduser.php">Back to add user</a>
 </body>
</html>