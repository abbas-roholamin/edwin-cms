<?php include "recources/header.php";?>
<?php include "function.php";?>
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
                        <?php include "recources/partials/post_table.php";?>
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