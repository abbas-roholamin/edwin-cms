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
                Home Page
            </h1>

            <!-- Blog Posts -->
            <?php
                    $sql = "SELECT * FROM posts WHERE status = '1' ORDER BY id DESC";
                    $results = $connection->query($sql);
                    $rows = $results->fetch_all(1);
                    foreach ($rows as $row):
                        $id = $row['id'];
                        $post_title = $row['title'];
                        $post_content = substr($row['content'],0,225);
                        $post_image = $row['image'];
                        $post_author = $row['author'];
                        $post_date = $row['date'];
                        $post_status = $row['status'];
            ?>
            <h2>
                <a href="post.php?post_id=<?=$id?>"><?= $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="post.php?author_posts=<?=$post_author?>"><?= $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date?></p>

            <hr>
            <?php $path = ($post_image)? "./public/image/$post_image" : "./public/image/image_1.jpg";?>
            <img class="img-responsive" src="<?= $path?>" alt="post iamge">

            <hr>
            <p><?= $post_content;?></p>
            <a class="btn btn-primary" href="post.php?post_id=<?=$id?>">Read More <span
                    class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <?php endforeach?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include_once("resources/layouts/sidebar.php");?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include_once('resources/layouts/footer.php');?>