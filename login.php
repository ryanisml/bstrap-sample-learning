<!-- Script php post / get -->
<?php
include 'database.php';
    session_start();
    if(isset($_SESSION['username'])){
        header('Location: index.php');
    }
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_user WHERE username='$username' AND password=md5('$password') LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if($row = $result->fetch_assoc()) {
                if($row['is_active'] == 1){
                    $_SESSION['username'] = $row['username'];
                    echo "<h2>Login Success</h2>";
                    header('Location: index.php');
                }else{
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Akun anda belum aktif.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
            }
            // while($row = $result->fetch_assoc()) {
            //     echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
            // }
        } else {
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