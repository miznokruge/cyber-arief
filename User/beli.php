<?php
@session_start();
require 'koneksi.php';
require 'item.php';
if (isset($_GET['id_barang'])) {
    $result = mysqli_query($koneksi, 'SELECT * From master_brg where id_barang=' . $_GET['id_barang']);
    $product = mysqli_fetch_object($result);
    $item = new Item();
    $item->id_barang = $product->id_barang;
    $item->nama_barang = $product->nama_barang;
    $item->harga = $product->harga;
    $item->stock = 0;
    $_SESSION['cart'][] = $item;
    // check product is existing in cart
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i = 0; $i < count($cart); $i++)
        if ($cart[$i]->id_barang == $_GET['id_barang']) {
            $index = $i;
            break;
        }
    if ($index == -1)
        $_SESSION['cart'][] = $item;
    else {
        $cart[$index]->stock++;
        $_SESSION['cart'] = $cart;
    }
}
// delete product in cart
if (isset($_GET['index'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
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
<!-- Custom Fonts -->
<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="container">
    <div class="page-header" align="center"><h1>PESSANAN ANDA</h1></div>
<?php echo isset($error) ? $error : ''; ?>
    <form method="post">
        <table class="table table-striped">
            <thead>
            <th>Option</th>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>quantity </th>
            <input type="hidden" name="update">
            </th>
            <th>Sub Total</th>
            </thead>
<?php
$cart = unserialize(serialize($_SESSION['cart']));
$s = 0;
$index = 0;
for ($i = 0; $i < count($cart); $i++) {
    $s += $cart[$i]->harga * $cart[$i]->stock;
    ?>
                <tbody>
                    <tr>
                        <td><a href="beli.php?index=<?php echo $index; ?>" onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-xs">Delete</a></td>
                        <td><?php echo $cart[$i]->id_barang; ?></td>
                        <td><?php echo $cart[$i]->nama_barang; ?></td>
                        <td><?php echo $cart[$i]->stock; ?></td>
                        <td><?php echo $cart[$i]->harga; ?></td>
                        <td><?php echo $cart[$i]->stock; ?></td>
                        <td><?php echo $cart[$i]->harga * $cart[$i]->stock; ?></td>
                    </tr>
                </tbody>
    <?php
    $index++;
    if ($cart[$i]->stock == 0) {
        echo "";
    }
}
?>
            <tr>
                <td colspan="5" align="right">Sum</td>
                <td align="left"><?php echo $s; ?></td>
            </tr>
        </table>
    </form>
    <a href="index.php"><button type="button" class="btn btn-outline btn-primary btn-xs">Tambah</button> </a>
    <a href="tr1.php"><button type="button" class="btn btn-outline btn-primary btn-xs">SELESAI</button> </a>
</div>
<form action="" method="POST">
    <input type="submit" name=" button">
<?php
if (isset($_POST['button'])) {
    include 'data_barang.php';
}
?>
</form>