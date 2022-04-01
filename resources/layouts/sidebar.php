<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        <div class="form-group">
            <form action="search.php" method="POST">
                <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off">
            </form>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <!-- /.row -->
        <div class="row">
            <!-- /.col-lg-6 -->
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $results = $connection->query($sql);
                    $rows = $results->fetch_all(1);
                    foreach ($rows as $row):
                        $post_title = $row['title'];
                    ?>
                    <li><a href="#"><?= $post_title?></a>
                    </li>
                    <?php endforeach?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
            accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>