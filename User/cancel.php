<?php 


include ('koneksi.php');
session_start();

	$query = $koneksi->query("SELECT * FROM master_brg where id_barang = '".$_GET['id_barang']."'");

	$data=$query->fetch_assoc();

	echo $data['id_barang'];

	$_SESSION['tharga'] = $_SESSION['tharga'] - ($data['dibeli'] * $data['harga']);


	$total = $data['stock'] + $data['dibeli'];

	$insert = $koneksi->query("UPDATE master_brg set stock = '$total',dibeli = 0, status=0 where id_barang = '".$_GET['id_barang']."'");


	if($insert){
		echo "<script>alert('save data success cok'); location.href='indexcart.php';</script>";
	}



?>