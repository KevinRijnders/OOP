<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=test', 'root', 'root');
   $stmt = $pdo->query("SELECT * FROM users");
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