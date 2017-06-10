<?php

//input data 
include "koneksi.php";
$id_barang = $_POST['id_barang'];
$id_kategori = $_POST['id_kategori'];
$stock = $_POST['stock'];
$nama_barang = $_POST['nama_barang'];
$merk = $_POST['merk'];
$harga = $_POST['harga'];
$tgl_publish = $_POST['tgl_publish'];
$kode_barang = $_POST['kode_barang'];
$koneksi->query("INSERT INTO master_brg set  nama_barang='$nama_barang', merk = '$merk',  stock='$stock', harga='$harga', id_kategori='$id_kategori', tgl_beli='$tgl_publish', kode_barang='$kode_barang'")or die(mysql_error());

header("location:index.php?page=daftar_barang");
?>

<?php 
/*
<?php
include "koneksi.php";
$lokasi_file =$_FILES ['photo']['tmp_name'];// tmp name merubah nama didatabase
$nama_file=$_FILES['photo']['name'];

// apabila ada gambar yg di upload

if(!empty($lokasi_file)){
	$pisah= explode(".", $nama_file);
	$fileExt=end($pisah);
	$namaFileUnik=time().rand().".".$fileExt;
	$lokasi_upload="photo_artikel/$namaFileUnik";
	move_uploaded_file($lokasi_file, $lokasi_upload);
	$koneksi->query("insert into master_brg (id_barang,
		                              id_kategori,
		                              stock,
		                              nama_barang,
		                              merk,
		                              harga,
		                              tgl_publish,
		                              kode_barang,
		                              photo)
		                       values('$_POST [id_barang]',
		                              '$_POST[id_kategori]',
		                              '$_POST[stock]',
		                              '$_POST[nama_barang]',
		                              '$_POST[merk]',
		                              '$_POST[harga]',
		                              '$_POST[tgl_publish]',
		                              '$_POST[kode_barang]',
		                              
		                              '$namaFileUnik')");
}
else
{
	$koneksi->query("insert into master_brg (id_barang,
		                              id_kategori,
		                              stock,
		                              nama_barang,
		                              merk,
		                              harga,
		                              tgl_publish,
		                              kode_barang)
		                     values('$_POST [id_barang]',
		                              '$_POST[id_kategori]',
		                              '$_POST[stock]',
		                              '$_POST[nama_barang]',
		                              '$_POST[merk]',
		                              '$_POST[harga]',
		                              '$_POST[tgl_publish]',
		                              '$_POST[kode_barang]')");

}
header('location:index.php?page=daftar_barang');

?>
*?
 ?>