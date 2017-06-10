<?php

include 'koneksi.php';
$id_barang = $_GET ['id_barang'];
$koneksi->query("delete from master_brg where id_barang ='$id_barang'");
header("location:index.php?page=daftar_barang");
?>