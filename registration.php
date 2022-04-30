<!-- Header -->
<?php include_once("resources/layouts/header.php");?>

<!-- Page Content -->
<div class="container">
    <div class="login_wrapper">
        <div class="content">
            <h1 class="text-center">Register</h1>
            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                <div class="form-group">
                    <label for="username" class="sr-only">User Name</label>
                    <input type="text" name="username" id="username" class="form-control"
                        placeholder="Enter Desired Username">
                </div>
                <div class="form-group">
                    <label for="username" class="sr-only">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        placeholder="Enter Desired First Name">
                </div>
                <div class="form-group">
                    <label for="username" class="sr-only">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        placeholder="Enter Desired Last Name">
                </div>
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                </div>

                <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-block" value="Register">
            </form>
        </div>
    </div>
</div>