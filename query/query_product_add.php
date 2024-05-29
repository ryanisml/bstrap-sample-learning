<?php
    include "../database.php";
    session_start();
    if($_POST['id'] != '0'){
        if(isset($_POST['name']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['stock'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            
            $query1 = "SELECT * FROM tb_product WHERE id='$id'";
            $product = mysqli_query($conn, $query1);
            if(mysqli_num_rows($product) == 0){
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Sorry! Product not found.'
                );
                header('Location: ../index.php?page=product');
            }

            // Start Check if image want to change or not
            $image = $_FILES['image'];
            $query = "UPDATE tb_product SET name='$name', category='$category', price='$price', stock='$stock' WHERE id='$id'";
            if($image['name'] != ''){
                $image_path = checkImage($image);
                $query = "UPDATE tb_product SET name='$name', category='$category', price='$price', stock='$stock', image_path='$image_path' WHERE id='$id'";
                // Upload image
                if(move_uploaded_file($image['tmp_name'], '../'.$image_path)){
                    // Remove last picture
                    $product = mysqli_fetch_array($product);
                    if(file_exists('../'.$product['image_path'])){
                        unlink('../'.$product['image_path']);
                    }
                }else{
                    $_SESSION['message'] = array(
                        'type' => 'danger',
                        'message' => 'Sorry, there was an error uploading your file'
                    );
                    header("location: ../index.php?page=edit-product&id=".$id);
                }
            }
            $update = mysqli_query($conn, $query);
            if($update){
                $_SESSION['message'] = array(
                    'type' => 'success',
                    'message' => 'Product updated successfully'
                );
                header("location: ../index.php?page=product");
            }else{
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Data gagal disimpan '.mysqli_error($conn)                   
                );
                header("location: ../index.php?page=edit-product&id=".$id);
            }
        }else{
            header("location: ../index.php?page=product");
        }
    }else{
        if(isset($_POST['name']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['stock'])){
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            // Start Upload
            // Replace name with only timestamp
            $image = $_FILES['image'];
            $image_path = checkImage($image);
            // Upload image
            if(move_uploaded_file($image['tmp_name'], '../'.$image_path)){
                $query = "INSERT INTO tb_product (name, category, price, stock, image_path) VALUES ('$name', '$category', '$price', '$stock', '$image_path')";
                $insert = mysqli_query($conn, $query);
                if($insert){
                    header("location: ../index.php?page=product");
                }else{
                    $_SESSION['message'] = array(
                        'type' => 'danger',
                        'message' => 'Data gagal disimpan '.mysqli_error($conn)                   
                    );
                    header("location: ../index.php?page=add-product");
                }
            }else{
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Sorry, there was an error uploading your file'
                );
                header("location: ../index.php?page=add-product");
            }
        }else{
            header("location: ../index.php?page=product");
        }
    }

    function checkImage($image){
        if($image['name'] != ''){
            // Replace name with only timestamp
            $image_name = time();
            // Path to store image
            $image_path = 'uploads/images/products/'.$image_name.'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
            // // Check if image file is less than 1MB
            if($image['size'] > 1000000){
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Sorry, your file is too large. Please upload file less than 1MB'
                );
                header("location: ../index.php?page=edit-product&id=".$id);
            }
            // // Check if file is an image
            $imageFileType = pathinfo($image['name'], PATHINFO_EXTENSION);
            if($imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'jpg'){
                $_SESSION['message'] = array(
                    'type' => 'danger',
                    'message' => 'Sorry, only JPG, JPEG, PNG files are allowed'
                );
                header("location: ../index.php?page=edit-product&id=".$id);
            }
            return $image_path;
        }else{
            return false;
        }
    }
?>