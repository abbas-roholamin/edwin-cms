<div>
    <!-- Categoroies table -->
    <table class="table table-spride ">
        <thead>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Category</th>
                <th>Date</th>
                <th>Image</th>
                <!-- <th>Number of comments</th> -->
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Get all categories form DB 
                $rows = getAllPosts();
                $i = 1;
                foreach ($rows as $row):
                    $id = $row['id'];
                    $category = $row['category'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $image = $row['image'];
                    $author = $row['author'];
                    $date = $row['date'];
                    //$comment_num = $row['comment_num'];
                    $status = $row['status'];
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$title?></td>
                <td><?=$content?></td>
                <td><?=$author?></td>
                <td><?=$category?></td>
                <td><?=$date?></td>
                <td>
                    <img src="../../../public/image/<?=$image?>" />
                </td>
                <!-- <td><?=$comment_num?></td> -->
                <td><?=$status?></td>
                <td>
                    <div class="action_dropdown_area">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
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