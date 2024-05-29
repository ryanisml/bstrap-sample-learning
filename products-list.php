<?php
include 'query/query_product_list.php';
?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
</div>
<div>
    <div class="card">
        <div class="card-body">
            <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-" . $_SESSION['message']['type'] . " alert-dismissible fade show' role='alert'>" . $_SESSION['message']['message'] . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                unset($_SESSION['message']);
            }
            ?>
            <a href="index.php?page=add-product" class="btn btn-sm btn-primary float-end mb-3"> <span data-feather="plus"></span> Add New Product</a>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($products) > 0) {
                        $no = 1; while ($product = mysqli_fetch_array($products)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['category'] ?></td>
                            <td>Rp <?= number_format($product['price'],2,",",".") ?></td>
                            <td><?= $product['stock'] ?></td>
                            <td class="text-center"><img src="<?= $product['image_path'] ?>" alt="<?= $product['name'] ?>" style="width: 100px;"></td>
                            <td>
                                <a href="index.php?page=edit-product&id=<?= $product['id'] ?>"class="btn btn-sm btn-warning">Edit</a>
                                <a href="query/query_product_delete.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data produk pada baris ke-<?= $no ?>?')">Delete</a>
                            </td>
                        </tr>
                    <?php 
                        $no++; }
                    } else { 
                    ?>
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
        </div>
    </div>
</div>