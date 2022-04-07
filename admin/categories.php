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
                        Dashboard / Categories
                    </h2>
                </div>
                <main>
                    <div class="col-lg-9">
                        <table class="table table-spride ">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Title</th>
                                    <th>Number of posts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM categories";
                                    $results = $connection->query($sql);
                                    $rows = $results->fetch_all(1);
                                    $i = 1;
                                    foreach ($rows as $row):
                                        $post_title = $row['title'];
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$post_title?></td>
                                    <td>10</td>
                                    <td>
                                        <div class="action_dropdown_area">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="fa fa-pencil info"></i>
                                                        Edit
                                                    </a>
                                                    <a href="#" class="dropdown-item">
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
                    </div>
                    <div class="col-lg-3">
                        <h4>Add Category</h4>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Category name"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Save">
                            </div>
                        </form>
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