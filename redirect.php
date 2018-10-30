<?php
    session_start();
    if(isset($_POST['txtbox'])){
        if ( $_POST['txtbox'] == '1'){
            header("Location: index.php");
            return;
        } else if ( $_POST['txtbox'] == 'google'){
            header("Location: http://www.google.com/");
            return;
        } else {
            header("Location: login.php");
            return;
        }
    }
    ?>



<html>
    <body>
    <h1>Simple redirect example</h1>
    <P>1 = index, nothing = login, google = google </p>
        <form method="post">
            <input type="text" name="txtbox">
            <input type="submit"/>
        </form>
    </body>
</html>