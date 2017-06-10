<?php
include ('koneksi.php');
	
// 	$select = $koneksi->query("SELECT * FROM master_brg where status = 1");

// 	$r = $select->fetch_assoc();

// 	echo $r['id_barang'];

// 	if ($row['id_barang'] != null) {

// 		$insert = $koneksi->query("INSERT INTO transaction_details set
// 			transaction_id = '$',
// 			product_id = '".$row['id_barang']."',
// 			qty = '".$row['dibeli']."' ");

// 	}

	$insert = $koneksi->query("INSERT INTO transactions (id_transaksi) VALUES (NULL)");



	
	if ($insert) {
		session_start();
		$_SESSION['tharga'] = 0;
		$idbarang = $koneksi->insert_id;


		echo "<script>location.href='buydetail.php?id=".$idbarang."';</script>";

	}else{
		echo "<script>alert('gasuskes');</script>";

	}
?>