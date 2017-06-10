<?php

include 'koneksi.php';
$id_admin = $_GET ['id_admin'];
$koneksi->query("delete from admin where id_admin ='$id_admin'");
header("location:index.php?page=daftar_akun");
?>