<?php 


include ('koneksi.php');


	$query = $koneksi->query("SELECT * FROM master_brg where status = 0 ");


    while ($data=$query->fetch_array()) {
    echo $data['id_barang'].",";       
    }
	
?>