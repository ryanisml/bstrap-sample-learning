<?php
include "database.php";
$query = "SELECT * FROM tb_product";
$products = mysqli_query($conn, $query);
?>