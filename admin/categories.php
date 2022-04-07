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
                    <div class="col-lg-12">
                        <?php 
                            // Add category to DB
                            if (isset($_POST['save'])) {
                                $category_name = $_POST['category_name'];
                                if ($category_name != "") {
                                    $sql = "INSERT INTO categories (title) VALUES ('{$category_name}')";
                                    $results = $connection->query($sql);
                                    if ($results) {
                                        echo "<div class='alert alert-success'>Saved</div>";
                                        header('Location: categories.php');
                                    }else{
                                        echo "<div class='alert alert-warning'>Not saved</div>";
                                    }
                                }else{
                                    echo "<div class='alert alert-danger'>Input feild is empty</div>";
                                }
                            }

                            // Delete cagtegoru form DB
                            if (isset($_GET['category_id'])) {
                                $id = $_GET['category_id'];
                                $sql = "DELETE FROM categories WHERE id = $id";
                                $results = $connection->query($sql);
                                if ($results) {
                                    header('Location: categories.php');
                                }
                            }


                            if (isset($_POST['update'])) {
                                $category_id = $_POST['category_id'];
                                $category_name = $_POST['category_name'];
                                if ($category_name != "") {
                                    $sql = "UPDATE categories SET title = '{$category_name}' WHERE id = $category_id";
                                    $results = $connection->query($sql);
                                    if ($results) {
                                        echo "<div class='alert alert-success'>Saved</div>";
                                        header('Location: categories.php');
                                    }else{
                                        echo "<div class='alert alert-warning'>Not saved</div>";
                                    }
                                }else{
                                    echo "<div class='alert alert-danger'>Input feild is empty</div>";
                                }
                            }
                        ?>
                    </div>
                    <div class="col-lg-9">

                        <!-- Categoroies table -->
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
                                    // Get all categories form DB 
                                    $sql = "SELECT * FROM categories";
                                    $results = $connection->query($sql);
                                    $rows = $results->fetch_all(1);
                                    $i = 1;
                                    foreach ($rows as $row):
                                        $id = $row['id'];
                                        $title = $row['title'];
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$title?></td>
                                    <td>10</td>
                                    <td>
                                        <div class="action_dropdown_area">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="categories.php?id=<?=$id?>" class="dropdown-item">
                                                        <i class="fa fa-pencil info"></i>
                                                        Edit
                                                    </a>
                                                    <a href="categories.php?category_id=<?=$id?>" class="dropdown-item">
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
                    <div class="col-lg-3">
                        <!-- Add category form -->
                        <div class="add-category-form">
                            <h4>Add Category</h4>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="category_name" class="form-control"
                                        placeholder="Category name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="save" class="btn btn-primary form-control" value="Save">
                                </div>
                            </form>
                        </div>
                        <!-- Add category form -->
                        <!-- Edit category form -->
                        <?php
                            if (isset($_GET["id"])):
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM categories WHERE id = $id";
                            $results = $connection->query($sql);
                            $rows = $results->fetch_all(1);
                            foreach ($rows as $row):
                                $id = $row['id'];
                                $title = $row['title'];
                            endforeach
                        ?>
                        <div class="edit-category-form">
                            <h4>Edit Category</h4>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="category_id" value="<?=$id?>">
                                    <input type="text" name="category_name" value="<?=$title?>" class="form-control"
                                        placeholder="Category name" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-primary form-control"
                                        value="Save">
                                </div>
                            </form>
                        </div>
                        <?php endif?>
                        <!-- Edit category form -->
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