<?php 
    $connect = new PDO('mysql:host=localhost;port=3306;dbname=misc', 'admin', 'adminpw');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?> 