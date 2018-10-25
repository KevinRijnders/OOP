<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kevin Rijnders</title>
  <meta name="description" content="PHP Week 2 assignment">
  <meta name="author" content="Kevin Rijnders">
  <style>
    * {
        font-family:Verdana;
        background-color: #999;
    }

    input {
        background-color: #fff;
    }
  </style>
</head>

<body>
    <h1>Welcome to the automotive database!</h1>
    <p>Please log in with your details below.</p>

    <form method="post">
        <p>Email:
        <input type="text" size="20" name="email"></p>
        <p>Password:
        <input type="text" size="20" name="password"></p>
        <p><input type="submit" value="Login"/>
        <br />
        <br />
        <a href="<?php echo($_SERVER['PHP_SELF']);?>">Refresh</a>
        </p>
    </form>
</body>
</html>