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
            <?php 
                $flag = (isset($_GET['flag']))? $_GET['flag'] : "";
                switch ($flag) {
                    case 'add':
                        include "recources/partials/posts/add-form.php";
                        break;
                    case 'edit':
                        include "recources/partials/posts/edit-form.php";
                        break;
                    default:
                        include "recources/partials/posts/post_table.php";
                        break;
                }
            ?>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include_once "recources/footer.php";?>