<?php require_once('../config/app.php');

$connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(mysqli_error($connection));