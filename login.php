<!-- Header -->
<?php include_once("resources/layouts/header.php");?>



<!-- Page Content -->
<div class="container">
    <div class="login_wrapper">
        <div class="content">
            <h1 class="text-center">Login</h1>
            <form action="/action_page.php">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>

        </div>
    </div>