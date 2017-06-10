<?php 

include ('koneksi.php');
session_start();
// 	$select = $koneksi->query("SELECT * FROM master_brg where status = 1");

// 	$r = $select->fetch_assoc();

// 	echo $r['id_barang'];

// 	if ($row['id_barang'] != null) {

// 		$insert = $koneksi->query("INSERT INTO transaction_details set
// 			transaction_id = '$',
// 			product_id = '".$row['id_barang']."',
// 			qty = '".$row['dibeli']."' ");

// 	}
	if(isset($_POST['a'])){

	$harga = $_SESSION['tharga'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$norek = $_POST['norek'];
	$pembayaran = $_POST['radio'];


	$insert = $koneksi->query("INSERT INTO transactions (id_transaksi , total_harga , nama_pembeli, norek, alamat, pembayaran) VALUES 
		(NULL , '".$harga."','".$nama."','".$norek."','".$alamat."','".$pembayaran."' )");

	if ($insert) {
		session_start();
		$idbarang = $koneksi->insert_id;

		
		$_SESSION['tharga'] = 0;

		echo "<script>location.href='buydetail.php?id=".$idbarang."';</script>";

	}else{
		echo "<script>alert('gasuskes');</script>";

	}
	}else{

	}

?>

 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Web Arief</title>

        <!-- Bootstrap Core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <br>	
        <br>	
        <div class="container">
     <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pembayaran 
            </div>
            </div>
            </div>
        <form action="buy.php" method="post">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div>Debit</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                           
                              <input type="radio" name="radio" value="debit">
                              <label>Debit</label>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div>Cash</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=daftar_akun">
                        <div class="panel-footer">                            
                                <input type="radio" name="radio" value="cash">
                                <label>Cash</label>                         
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pembayaran Debit
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label>Nama </label>
                                <input class="form-control" name="nama">
                                
                            </div>
                            <div class="form-group">
                                <label>No Rekeningt</label>
                                <input class="form-control" name="norek">
                                
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat">
                                
                            </div>
                        <input type="submit" name="a" class="btn btn-outline btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
</div>