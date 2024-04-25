<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title halaman -->
        <title>Membuat Website dengan PHP</title>
        <meta charset="UTF-8">
        <!-- Pengaturan logo -->
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
        <!-- Pengaturan style css -->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap CSS -->
        <!-- Jangan di ubah -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Bagian header company name dan sign out -->
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="logout.php">Sign out</a>
                </div>
            </div>
        </header>
        <!-- Penutup header company name dan sign out -->
        <!-- Bagian navigasi sebelah kiri -->
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php?page=home">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=about">
                                    <span data-feather="file"></span>
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=contact">
                                    <span data-feather="layers"></span>
                                    Contact
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=user">
                                    <span data-feather="users"></span>
                                    Users
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Penutup navigasi -->
        <!-- Bagian content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                    include "home.php";
                    break;
                    case 'about':
                    include "about.php";
                    break;
                    case 'contact':
                    include "contact.php";
                    break;
                    case 'user':
                    include "user.php";
                    break; 
                }
            }
            else{
                include "home.php";
            }
        ?>
        </main>
        <!-- Penutup bagian content -->
        <!-- Bagian script ini tidak perlu diubah -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/feather/feather.min.js"></script>
    <script src="assets/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
        <!-- Penutup bagian script -->
    </body>
</html>