<!-- DB -->
<?php include_once("database/db.php");?>
<?php include_once("admin/function.php");?>
<?php session_start();?>
<?php
    if (isset($_GET['logout'])) {
           $result = logout();
           if($result == 1){
               header("Location: index.php");
           }
    }?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/x-icon" href="../../public/image/favicon.png">
        <title>Edwin-cms</title>

        <!-- Bootstrap Core CSS -->
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="public/css/blog-home.css" rel="stylesheet">
        <link href="public/css/custome.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>