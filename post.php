<!-- DB -->
<?php include_once("database/db.php");?>
<!-- Header -->
<?php include_once("resources/layouts/header.php");?>

<!-- Navigation -->
<?php include_once("resources/layouts/navbar.php");?>

<!-- Page Content -->
<div class="container">

    <?php               
        // Edit post func -->
        if (isset($_GET["id"])){
            $data = getPostById($_GET["id"]);
        }?>
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

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="./public/image/user.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                    commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                    condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="./public/image/user.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                    commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                    condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="./public/image/user.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                            turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                            felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>


        <!-- Blog Sidebar Widgets Column -->
        <?php include_once("resources/layouts/sidebar.php");?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include_once('resources/layouts/footer.php');?>