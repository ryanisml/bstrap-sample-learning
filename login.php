<!-- Script php post / get -->
<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
  
        if($username == "admin" && $password == "admin"){
            echo "<h2>Login Success</h2>";
            header('Location: index.php');
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Username atau Password Anda Salah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Pengaturan logo -->
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
        <!-- Pengaturan style css -->
        <link rel="stylesheet" href="assets/css/login_style.css">
        <!-- Bootstrap CSS jangan diubah -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- Title halaman -->
        <title>Simple Login Page</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Login Page</h3>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input
                                        type="username"
                                        class="form-control"
                                        name="username"
                                        id="username"
                                        placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="Password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        id="Password"
                                        placeholder="Password">
                                </div>
                                <label class="mb-3">
                                    <input type="checkbox" name="RememberMe">
                                    Remember Me
                                </label>
                                <a href="#" class="float-end text-decoration-none">Reset Password</a>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <hr>
                                <p class="text-center mb-0">If you have not account
                                    <a href="#">Register Now</a>
                                </p>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/bootstrap/js/popper.min.js"></script>
    </body>
</html>