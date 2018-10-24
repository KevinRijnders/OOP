<?php 
    $connect = new PDO('mysql:host=localhost;port=3306;dbname=test', 'root', 'root');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>