<?php
    include '../database.php';
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['full_name']) && isset($_POST['phone'])){
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        if($password != $confirm_password){
            $_SESSION['message'] = array(
                'type' => 'warning',
                'message' => 'Maaf! Password dan Confirm Password tidak sama.'                   
            );
            header('Location: ../register.php');
            exit();
        }

        $sql = "SELECT * FROM tb_user WHERE username='$username' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['message'] = array(
                'type' => 'warning',
                'message' => 'Maaf! Username '.$username.' sudah terdaftar.'                   
            );
            header('Location: ../register.php');
            exit();
        }

        $sql = "INSERT INTO tb_user (full_name, username, password, nomor_telepon, is_active) VALUES ('$full_name', '$username', md5('$password'), '$phone', 1)";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = array(
                'type' => 'success', 
                'message' => 'Selamat! Akun berhasil dibuat.'                   
            );
            header('Location: ../login.php');
        } else {
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'Maaf! Akun gagal dibuat '.$conn->error                   
            );
        }
    }
    header('Location: ../register.php');
?>