<?php
include "database.php";
$query = "SELECT id, full_name, username, nomor_telepon, is_active FROM tb_user";
$users = mysqli_query($conn, $query);
?>