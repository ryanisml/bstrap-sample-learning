<?php
include 'query/query_user_list.php';
?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>
<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($users) > 0) {
                        $no = 1; while ($user = mysqli_fetch_array($users)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $user['full_name'] ?></td>
                            <td><?= $user['nomor_telepon'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td>
                                -
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