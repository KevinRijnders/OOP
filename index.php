<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
   echo "<pre><br>";
   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=test', 'root', 'root');
   $stmt = $pdo->query("SELECT * FROM users");
   while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       print_r($row);
   }
   echo "</pre>";
 ?> 
 </body>
</html>