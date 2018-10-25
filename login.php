<?php // Do not put any HTML above this line
if ( isset($_POST['refresh'] ) ) {
    // Redirect the browser to game.php
    header("Location: login.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // php123
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
        
        // Redirect the browser to game.php
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
      
      $failure = "Email must have an at-sign (@)";
    }    
}
// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<title>Kevin Rijnders</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">E-mail</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="pass" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="refresh" value="Refresh">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Disregard this hint. Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
</p>
</div>
</body>