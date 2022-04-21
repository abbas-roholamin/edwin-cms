<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Dashboard / Add User
        </h2>
    </div>
    <main>
        <div class="col-lg-12">
            <?php
                if (isset($_POST['save'])) {
                    $result = saveUser($_POST);
                    if (!$result == 1) {
                        echo $result;
                    }
                }
            ?>
            <form action="" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="User Name"
                                id="user_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                id="first_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                id="last_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tag">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password"
                                id="password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="1">Admin</option>
                                <option value="2">Subscriber</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="custom-file form-group">
                            <label for="tag">Image</label>
                            <input type="file" class="custom-file-input form-control" name="image" id="image">
                        </div>
                    </div>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </form>
        </div>
    </main>
</div>
<!-- /.row -->