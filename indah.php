<!DOCTYPE html>
<html>
<head>
	<title>gue</title>
</head>
<body>

<?php 

session_start();
include 'koneksi.php';

class item{
	var $id;
	var $nama;
	var $harga;
	var $quantity;

}


if (isset($_GET['id'])){
	$result = mysqli_query($koneksi, 'select * from product where id_bj'.$_GET['id']);
	$product = mysqli_fetch_object($result);
	$item 	= new item();
	$item->id=$product->id_bj;
	$item->nama=$product->nama;
	$item->harga=$product->harga;
	$item->quantity=1;

	// check product is ecisting in cart
	$cart = unserialize(serialize($_SESSION['cart']));
	$index = -1;
	for ($i=0; $i <count($cart) ; $i++)
		if ($cart[$i]->id==$_GET['id']) {
			$index = $i;
			break;
		}
		if ($index ==-1) {
			$_SESSION['cart'][] =$item;
		}
		else
		{
			$cart[$index]->quantity++;
			$_SESSION['cart'] = $cart;
		}

}
// delete product in cart

if (isset($_GET['index'])) {
	$cart = unserialize(serialize($_SESSION)['cart']);
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'];
}


 ?>

 <div class="container">
 	<div class="page-header" align="center"><h1></h1>
 		
 	</div>
 	
 </div>

</body>
</html>