<?php 
    // DataBase Info
    define("DB_HOST",'localhost');
    define("DB_USER",'root');
    define("DB_PASSWORD",'');
    define("DB_NAME",'edwin-cms');
    
    $connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(mysqli_error($connection));

?>