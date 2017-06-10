<?php

include 'koneksi.php';
$id_kategori = $_GET ['id_kategori'];
$koneksi->query("delete from kategori_brg where id_kategori ='$id_kategori'");
header("location:index.php?page=daftar_kategori");
?>