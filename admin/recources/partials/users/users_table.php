<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Dashboard / Users
        </h2>
    </div>
    <main>
        <div class="col-lg-12">
            <?php
                // Delete posts form DB
                if (isset($_GET['user_id'])) {
                    $id = $_GET['user_id'];
                    deleteUser($id);
                }
            ?>
            <table class="table table-spride posts_table">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Image</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get all posts form DB 
                    $rows = getAllUsers();
                    $i = 1;
                    foreach ($rows as $row):
                        $id = $row['id'];
                        $image = $row['image'];
                        $user_name = $row['user_name'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $email = $row['email'];
                        $role = $row['role'];;
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <td>
                            <?php $path = ($image)? "./public/image/$image" : "./public/image/user.png";?>
                            <img src="<?=$path?>" class="media-object" alt="<?=$user_name?>" />
                        </td>
                        <td><?=$user_name?></td>
                        <td><?=$first_name?></td>
                        <td><?=$last_name?></td>
                        <td><?=$email?></td>
                        <td><?=( $role == 1)? "admin" : "subscriber";?></td>
                        <td>
                            <div class="action_dropdown_area">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" style="left: -45px;">
                                        <a href="users.php?flag=edit&id=<?=$id?>" class="dropdown-item">
                                            <i class="fa fa-pencil info"></i>
                                            Edit
                                        </a>
                                        <a href="users.php?user_id=<?=$id?>" class="dropdown-item"
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