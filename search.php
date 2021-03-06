<!-- DB -->
<?php include_once("database/db.php");?>
<!-- Header -->
<?php include_once("resources/layouts/header.php");?>

<!-- Navigation -->
<?php include_once("resources/layouts/navbar.php");?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Search Page
            </h1>

            <!-- Blog Posts -->
            <?php
                if (isset($_POST['search'])):
                    $key_word = $_POST['search'];
                    $sql = "SELECT * FROM posts WHERE title LIKE '%$key_word%' OR content LIKE '%$key_word%'";
                    $results = $connection->query($sql);
                    $rows = $results->fetch_all(1);
                    foreach ($rows as $row):
                        $post_title = $row['title'];
                        $post_content = $row['content'];
                        $post_image = $row['image'];
                        $post_author = $row['author'];
                        $post_date = $row['date'];
                        $post_status = $row['status'];
                

            ?>
            <h2>
                <a href="#"><?= $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date?></p>

            <hr>
            <img class="img-responsive" src="./public/image/<?= $post_image; ?>" alt="">

            <hr>
            <p><?= $post_content;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            <?php endforeach?>
            <?php else: ?>
            <p class="alert alert-info text-center">NO RESULTS FOUND</p>
            <?php endif ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include_once("resources/layouts/sidebar.php");?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include_once('resources/layouts/footer.php');?>