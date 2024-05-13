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
                            <?php
                                if(isset($_SESSION['message'])){
                                    echo "<div class='alert alert-".$_SESSION['message']['type']." alert-dismissible fade show' role='alert'>".$_SESSION['message']['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <form action="query/query_register.php" method="post" autocomplete="off">
                                <div class="mb-3">
                                    <label for="full_name">Full Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="full_name"
                                        placeholder="Full Name"
                                        value="<?= (isset($_POST['full_name'])) ? $_POST['full_name'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="phone"
                                        placeholder="Phone Number"
                                        value="<?= (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        placeholder="Username"
                                        value="<?= (isset($_POST['username'])) ? $_POST['username'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <label for="Password">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="confirm_password"
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