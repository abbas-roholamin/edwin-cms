<!-- DB -->
<?php include_once("database/db.php");?>
<!-- Header -->
<?php include_once("resources/layouts/header.php");?>

<!-- Navigation -->
<?php include_once("resources/layouts/navbar.php");?>

<!-- Page Content -->
<div class="container">

    <?php
        $flag = (isset($_GET['post_id']))? "single_post" : "category_posts";
        switch ($flag) {
            case 'single_post':
                include "resources/partials/posts/single_post.php";
                break;
            case 'category_posts':
                include "resources/partials/posts/category_posts.php";
                break;
            default:
                header('Location: index.php');
                break;
        }
    ?>

    <hr>

    <!-- Footer -->
    <?php include_once('resources/layouts/footer.php');?>