<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
   require_once "connect.php";
   $stmt = $connect->query("SELECT * FROM users");
   echo '<table border="1">';
   while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo '<tr><td>';
       echo($row['name']);
       echo '</td><td>';
       echo($row['email']);
       echo '</td><td>';
       echo($row['password']);
       echo('</td></tr>');
   }
   echo('</table>');

   
 ?> 
 
 
 
 <a href="adduser.php">Add user</a><br>
 <a href="deleteuser.php">Delete user</a>
 </body>
</html>