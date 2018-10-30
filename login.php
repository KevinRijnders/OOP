<?php
require_once "connect.php";
if ( isset($_POST['refresh'] ) ) {
    header("Location: login.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // php123 hashed in md5
$failure = false;


if ( isset($_POST['who']) && isset($_POST['pass']) ) {
  $who = htmlentities($_POST['who']);
  $pass = htmlentities($_POST['pass']);
    if ( strlen($who) < 1 || strlen($pass) < 1 ) {
        $failure = "User name and password are required";
    } 
    elseif ( filter_var($who, FILTER_VALIDATE_EMAIL)) {
      $check = hash('md5', $salt.$pass);
      if ( $check == $stored_hash ) {
        try {
          throw new Exception("Login success ".$who);
        }
        catch (Exception $ex) {
          error_log($ex->getMessage());
        }
        header("Location: autos.php?name=".urlencode($who));
        return;
            
      } else {
          try {
            throw new Exception("Login fail ".$who." $check");
          }
          catch (Exception $e) {
            error_log($e->getMessage());
          }
          
          $failure = "Incorrect password";
      }
      
    }
    
    else {
      
      $failure = "Email must have an @";
    }    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Kevin Rijnders</title>
</head>
<body>

<h1>Welcome to the automotive database!</h1>
<a>Please Log In</a>
<form method="POST">
<p>E-mail</p>
<input type="text" name="who" id="nam"><br/>
<p>Password</p>
<input type="pass" name="pass" id="id_1723"><br/><br/><br/>
<?php
if ( $failure !== false ) {
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<input type="submit" value="Log In">
<input type="submit" name="refresh" value="Refresh">
</form>

</body>