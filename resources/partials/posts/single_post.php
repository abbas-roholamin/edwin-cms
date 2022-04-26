    <?php               
        // Edit post func -->
        if (isset($_GET["post_id"])){
            $data = getPostById($_GET["post_id"]);
            $commentData = getAllAprovedCommentsByPostId($_GET["post_id"]);
        }
        if (isset($_POST['submit'])) {
            $result = saveComment();
            if (!$result == 1) {
                echo $result;
            }
        }

        


    ?>
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?=$data['title']?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?=$data['author']?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$data['date']?></p>

            <hr>

            <!-- Preview Image -->
            <?php $path = ($data['old_image'])? "./public/image/".$datas['old_image'] : "./public/image/image_1.jpg";?>
            <img class="img-responsive" src="<?=$path?>" alt="<?=$data['title']?>">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                <?= $data['content'] ?>
            </p>
            <?php  if(isset($_SESSION['role'])):?>
            <a class="btn btn-primary" href="admin/posts.php?flag=edit&id=<?=$_GET["post_id"]?>">
                <i class="fa fa-pencil info"></i>Edit
            </a>
            <?php endif?>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="author">Name</label>
                        <input type="text" name="author" class="form-control" id="author">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="content">Comment</label>
                        <textarea name="content" class="form-control" rows="3" id="content"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <?php foreach($commentData as $comment):?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="./public/image/user.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?=$comment["author"]?>
                        <small><?=$comment["date"]?></small>
                    </h4>
                    <?=$comment["content"]?>
                </div>
            </div>
            <?php endforeach?>
        </div>


        <!-- Blog Sidebar Widgets Column -->
        <?php include_once("resources/layouts/sidebar.php");?>

    </div>
    <!-- /.row -->