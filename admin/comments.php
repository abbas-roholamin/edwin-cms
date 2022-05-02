<?php include "recources/header.php";?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include_once "recources/navbar.php";?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include_once "recources/sidebar.php";?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Dashboard / Comments
                    </h2>
                </div>
                <main>
                    <div class="col-lg-12">
                        <?php
                            // Delete posts form DB
                            if (isset($_GET['comment_id'])) {
                                $id = $_GET['comment_id'];
                                deleteComment($id);
                            }
                            
                            if(isset($_GET["status"])){
                                changeCommentStatus($_GET);
                            }
                        ?>
                        <table class="table table-spride posts_table">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>content</th>
                                    <th>status</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Get all posts form DB 
                                    $rows = getAllComments();
                                    $i = 1;
                                    foreach ($rows as $row):
                                        $id = $row['id'];
                                        $post_name = $row['post_name'];
                                        $author = $row['author'];
                                        $email = $row['email'];
                                        $content = $row['content'];
                                        $status = $row['status'];
                                        $date = $row['date'];
                                    ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$author?></td>
                                    <td><?=$email?></td>
                                    <td><?=$content?></td>
                                    <td><?=$post_name?></td>
                                    <td><?=$status?></td>
                                    <td><?=$date?></td>
                                    <td>
                                        <div class="action_dropdown_area">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" style="left: -45px;">
                                                    <?php  if($status == "aproved"){?>
                                                    <a href="comments.php?id=<?=$id?>&status=1" class="dropdown-item">
                                                        <i class="fa fa-times  danger"></i>
                                                        Unaproved
                                                    </a>
                                                    <?php }else{?>
                                                    <a href="comments.php?id=<?=$id?>&status=0" class="dropdown-item">
                                                        <i class="fa fa-check  danger"></i>
                                                        Aprove
                                                    </a>
                                                    <?php }?>

                                                    <a href="comments.php?comment_id=<?=$id?>" class="dropdown-item"
                                                        onclick="javascript: return confirm('Are your sure you want delete?')">
                                                        <i class="fa fa-trash  danger"></i>
                                                        Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; endforeach?>
                            </tbody>
                        </table>
                        <!-- Categoroies table -->
                    </div>
                </main>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "recources/footer.php";?>