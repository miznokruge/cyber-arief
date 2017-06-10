<?php

include 'koneksi.php';
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];


$koneksi->query("UPDATE kategori_brg set nama_kategori='" . $_POST['nama_kategori'] . "'
	where id_kategori='$id_kategori'");
header("location:index.php?page=daftar_kategori");
?>