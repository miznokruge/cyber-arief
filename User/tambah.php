<?php 

include ('koneksi.php');
@session_start();
$i = $_SESSION['tharga'];


	$query = $koneksi->query("SELECT * FROM master_brg where id_barang = '".$_GET['id_barang']."'");

	$data=$query->fetch_assoc();

	echo $data['id_barang'];
	$total = $data['stock'] - 1;
	$totalbaru = $data['dibeli'] + 1;
	
		$insert = $koneksi->query("UPDATE master_brg set stock = '$total',dibeli = '$totalbaru', status=1 where id_barang = '".$_GET['id_barang']."'");


	if($insert){
		$_SESSION['tharga'] = $data['harga'] + $_SESSION['tharga'];
		echo "<script>alert('save data success cok'); location.href='indexcart.php';</script>";
	}else
	{
		echo "failed";
		die;
	}

	


?>