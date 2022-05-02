<!-- Header -->
<?php include_once("resources/layouts/header.php");?>
<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = login($email,$password);
        if ($result != 0) {
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['user_name'] = $result['user_name'];
            $_SESSION['first_name'] = $result['first_name'];
            $_SESSION['last_name'] = $result['last_name'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['image'] = $result['image'];
            $_SESSION['role'] = $result['role'];
            header("Location: admin/");
        }
    }
?>

<!-- Page Content -->
<div class="container">
    <div class="login_wrapper">
        <div class="content">
            <h1 class="text-center">Login</h1>
            <?php if(isset($result)){
                if($result == 0){
                    echo "<div class='bg-danger text-center'>Email or password is incorrect!</div>";
                }
            }?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </form>

        </div>
    </div>