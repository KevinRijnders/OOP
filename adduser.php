<html>
 <head>
  <title>PHP Add user</title>
 </head>
 <body>
 <?php 
   require_once "connect.php";

   if ( isset($_POST['name']) &&  isset($_POST['email']) && isset($_POST['password']) ) {
       $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
       echo ("<pre><br>" .$sql. "<br></pre><br>");
       $stmt = $connect->prepare($sql);
       $stmt->execute(array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
            )
       );
   }   
 ?> 
    <p>Add a new user</p>
    <form method="post">
        <p>Name:<input type="text" name="name" size="25"></p>
        <p>Email:<input type="text" name="email" size="25"></p>
        <p>Password:<input type="password" name="password" size="25"></p>
        <p><input type="submit" value="Add new"/></p>
    </form>
    <br>
    <br>
<?php
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
   echo('</table>');?>

    <br>
    <br>
    <br>
    <a href="../oop/index.php">Back to index</a><br>
    <a href="../oop/deleteuser.php">Delete user</a>
 </body>
</html>