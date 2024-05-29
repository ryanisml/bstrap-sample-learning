<?php
    $edit = false;
    if($_GET['page'] == 'edit-product'){
        include "query/query_product_edit.php";
        $edit = true;
    }
?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= ($edit) ? "Edit Product" : "Add New Product" ; ?></h1>
</div>
<div>
    <div class="card">
        <div class="card-body">
            <?php
                if(isset($_SESSION['message'])){
                    echo "<div class='alert alert-".$_SESSION['message']['type']." alert-dismissible fade show' role='alert'>".$_SESSION['message']['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['message']);
                }
            ?>
            <form action="query/query_product_add.php" method="post" enctype="multipart/form-data">
                <?php if($edit){ ?>
                <?php } ?>
                <input type="hidden" name="id" value="<?= ($edit) ? $product['id'] : '0' ?>">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" value="<?= ($edit) ? $product['name'] : "" ; ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Category</label>
                    <select class="form-select" name="category">
                        <option value="Makanan Berat" <?= ($edit && $product['category'] == 'Makanan Berat') ? "selected" : "" ; ?>>Makanan Berat</option>
                        <option value="Makanan Ringan" <?= ($edit && $product['category'] == 'Makanan Ringan') ? "selected" : "" ; ?>>Makanan Ringan</option>
                        <option value="Minuman" <?= ($edit && $product['category'] == 'Minuman') ? "selected" : "" ; ?>>Minuman</option>
                        <option value="Add-On"  <?= ($edit && $product['category'] == 'Add-On') ? "selected" : "" ; ?>>Add-On</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Price" name="price" value="<?= ($edit) ? $product['price'] : "" ; ?>">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" placeholder="Stock" name="stock" value="<?= ($edit) ? $product['stock'] : "" ; ?>">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-sm btn-primary float-end"> <span data-feather="save"></span> Simpan</button>
            </form>
        </div>
    </div>
</div>