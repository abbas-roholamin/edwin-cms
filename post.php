<!-- DB -->
<?php include_once("database/db.php");?>
<!-- Header -->
<?php include_once("resources/layouts/header.php");?>

<!-- Navigation -->
<?php include_once("resources/layouts/navbar.php");?>

<!-- Page Content -->
<div class="container">

    <?php
        if(isset($_GET['post_id'])){
            $flag ="single_post";
        }elseif(isset($_GET['category_posts'])){
            $flag ="category_posts";
        }elseif(isset($_GET['author_posts'])){
            $flag ="author_posts";
        }
        switch ($flag) {
            case 'single_post':
                include "resources/partials/posts/single_post.php";
                break;
            case 'category_posts':
                include "resources/partials/posts/category_posts.php";
                break;
            case 'author_posts':
                include "resources/partials/posts/author_posts.php";
                break;
            default:
                header('Location: index.php');
                break;
        }
    ?>

    <hr>

    <!-- Footer -->
    <?php include_once('resources/layouts/footer.php');?>