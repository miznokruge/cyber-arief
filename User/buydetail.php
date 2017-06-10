<?php	

include ('koneksi.php');

	$select = $koneksi->query("SELECT * FROM master_brg where status = 1");

	$r = $select->fetch_assoc();

	$total = $select->num_rows;

	if ($total == 0) {

		$id = $_GET['id'];

		$select2 = $koneksi->query("SELECT * FROM transactions where id_transaksi = '$id'");

		$data = $select2->fetch_assoc();

		$th = $data['total_harga'];



		echo "<script>location.href='index.php'; alert('Kode Pembelian anda adalah : $id , dengan total harga : $th');</script>";





	}else{

		$totalhrg = $r['harga'] * $r['dibeli']; 

		$insert = $koneksi->query("INSERT INTO transaction_details set
			transaction_id = '".$_GET['id']."',
			product_id = '".$r['id_barang']."',
			jumlah_harga = '".$totalhrg."',
			qty = '".$r['dibeli']."' ");


		$edit = $koneksi->query("UPDATE master_brg set dibeli = 0, status = 0 where id_barang = '".$r['id_barang']."'");

		if($edit){
		echo "<script>location.href='buydetail.php?id=".$_GET['id']."';</script>";
			
		}else{

		echo "<script>alert('save data Tidak success cok'); location.href='index.php';</script>";
			
		}

	}




	$query = $koneksi->query("SELECT * FROM master_brg where id_barang = '".$_GET['id_barang']."'");

	$data=$query->fetch_assoc();

	echo $data['id_barang'];
	
	$insert = $koneksi->query("UPDATE master_brg set stock = '$total',dibeli = 0, status=0 where id_barang = '".$_GET['id_barang']."'");


	if($insert){
		echo "<script>alert('save data success cok'); location.href='indexcart.php';</script>";
	}else{
	echo "<script>alert('save data Tidak success cok'); location.href='index.php';</script>";
		
	}





?>