<?php
    include "../database.php";
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tb_product WHERE id='$id'";
        $product = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($product);
        if (!empty($data)) {
            $query = "DELETE FROM tb_product WHERE id='$id'";
            $delete = mysqli_query($conn, $query);
            if ($delete) {
                if(file_exists('../'.$data['image_path'])){
                    unlink('../'.$data['image_path']);
                }
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'message' => 'Data dengan nama produk ' . $data['name'] . ' berhasil dihapus'
                );
            } else {
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Data gagal dihapus ' . mysqli_error($conn)
                );
            }
        }else{
            $_SESSION['message'] = array(
                'type' => 'danger',
                'message' => 'Data tidak ditemukan'
            );
        }
    }
    header("location: ../index.php?page=product");
?>