<?php

include 'koneksi.php';
$id_barang = $_POST['id_barang'];
$id_kategori = $_POST['id_kategori'];
$stock = $_POST['stock'];
$nama_barang = $_POST['nama_barang'];
$merk = $_POST['merk'];
$harga = $_POST['harga'];
$kode_barang = $_POST['kode_barang'];

$koneksi->query("UPDATE master_brg set id_barang='$id_barang', id_kategori='$id_kategori', stock='$stock', nama_barang='$nama_barang', merk='$merk', harga='$harga', kode_barang='$kode_barang' where id_barang='$id_barang'");
header("location:index.php?page=daftar_barang");
?>
