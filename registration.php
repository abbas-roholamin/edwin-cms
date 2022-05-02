<!-- Header -->
<?php include_once("resources/layouts/header.php");?>
<?php
    if (isset($_POST['registration'])) {
        $data['user_name'] = $_POST['user_name'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $result = registration($data);
    }
?>
<!-- Page Content -->
<div class="container">
    <div class="registration_wrapper">
        <div class="content">
            <h1 class="text-center">Registertion</h1>
            <?=isset($result)? "<div class='bg-warning text-center'>$result</div>" : ""?>
            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="username">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="username">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                </div>

                <input type="submit" name="registration" class="btn btn-primary btn-block" value="Register">
            </form>
        </div>
    </div>
</div>