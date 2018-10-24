<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
   require_once "connection.php";
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
 </body>
</html>