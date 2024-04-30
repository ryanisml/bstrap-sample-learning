<!-- Script php post / get -->
<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('Location: index.php');
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
        <title>Simple Register Page</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Register Page</h3>
                        </div>
                        <div class="card-body">
                            <form action="query/query_register.php" method="post">
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
                                <div class="mb-3">
                                    <label for="Password">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="confirm_password"
                                        id="confirm_Password"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <hr>
                                <p class="text-center mb-0">If you have an account
                                    <a href="login.php">Login Now</a>
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