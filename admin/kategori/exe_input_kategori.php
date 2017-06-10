<?php

//input data 
include "koneksi.php";
$nama_kategori = $_POST['nama_kategori'];

$koneksi->query("INSERT INTO kategori_brg set nama_kategori='" . $_POST['nama_kategori'] . "'");

header("location:index.php?page=daftar_kategori");
?>