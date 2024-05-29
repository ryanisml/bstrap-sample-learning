<?php
    include "database.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_product WHERE id='$id'";
    $product = mysqli_query($conn, $query);
    if(mysqli_num_rows($product) == 0){
        $_SESSION['message'] = array(
            'type' => 'danger',
            'message' => 'Maaf! Produk tidak ditemukan.'
        );
        header('Location: ../index.php?page=product');
    }else{
        $product = mysqli_fetch_array($product);
    }
?>