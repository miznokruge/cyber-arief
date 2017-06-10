
<?php
    session_start();
    require 'koneksi.php';
    require 'item.php';


$namapemesan="";
$alamat="";
$provinsi="";
$kota="";
$kodepos="";
$nohp="";

if(isset($_POST['namapemesan']) && !empty($_POST['namapemesan'])){
    $namapemesan = $_POST['namapemesan'];
    $alamat = $_POST['alamat'];
  $provinsi=$_POST['provinsi'];
  $kota=$_POST['kota'];
  $kodepos=$_POST['kodepos'];
  $nohp=$_POST['nomor'];

}else{
    $namapemesan = "Nama default";
    $alamat = "default";
    $provinsi = "default";
    $kota = "default";
    $kodepos = "default";
    $nohp = "default";
}

mysqli_query($koneksi, 'INSERT into transactions(nama, datecreation, status, alamat, provinsi, kota, kodepos, nohp) values ("'.$namapemesan.'", "'.date('Y-m-d').'", 0, "'.$alamat.'", "'.$provinsi.'", "'.$kota.'", "'.$kodepos.'", "'.$nohp.'")');
$ordersid = mysqli_insert_id($koneksi);

//Save order details for new order
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i=0; $i <count($cart) ; $i++) {
      //echo "Jumlah belanja ".$cart[$i]->quantity;
       mysqli_query($koneksi, 'INSERT into transactions_details (productid, ordersid, price, quantity) values ("'.$cart[$i]->id.'", "'.$ordersid.'", "'.$cart[$i]->harga.'", "'.$cart[$i]->quantity.'")');
       $update = "UPDATE products SET stock=(stock - ".$cart[$i]->quantity.")  WHERE id_bj = ".$cart[$i]->id;
       $koneksi->query($update);
    }


// Clear all products in  
    unset($_SESSION['cart']);
?>
Thanks for buying products. click <a href="coba.php">here</a> to koneksitinue buy product
