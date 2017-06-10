<?php

$page = (isset($_GET['act'])) ? $_GET['act'] : "main";
switch ($page) {
    // ini untuk input data akun
    case 'beli' : include "cart.php";
        break;

    case 'main':
    default : include 'data_barang.php';
}
?>
