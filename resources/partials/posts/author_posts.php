<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <!-- Blog Posts -->
        <?php
            $author = $_GET['author_posts'];
            $sql = "SELECT * FROM posts WHERE author='$author'";
            $results = $connection->query($sql);
            $rows = $results->fetch_all(1);
            foreach ($rows as $row):
                $id = $row['id'];
                $post_title = $row['title'];
                $post_content = substr($row['content'],0,225);
                $post_image = $row['image'];
                $post_date = $row['date'];
                $post_status = $row['status'];
            ?>
        <h2>
            <a href="post.php?post_id=<?=$id?>"><?= $post_title; ?></a>
        </h2>
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