<?php
function includePage($currentPage) {
    // Define allowed pages and their corresponding file paths
    $allowedPages = [
        'home' => 'home.php',
        'contact' => 'contact.php',
        'user' => 'user-list.php',
        'product' => 'products-list.php',
        'add-product' => 'products-add.php',
        'edit-product' => 'products-add.php', // Note: 'edit-product' and 'add-product' lead to the same file
        'transaction' => 'transaction.php',
    ];

    // Check if the current page is in the allowed list, if not, default to 'home'
    $fileToInclude = isset($allowedPages[$currentPage]) ? $allowedPages[$currentPage] : 'home.php';

    // Include the file
    include $fileToInclude;
}
?>