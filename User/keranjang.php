<?php
session_start();
require 'koneksi.php';
require 'item.php';
?>
<html>
    <head>
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
    </head>   
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i>Home</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php?page=aboutus">about us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="beli_sementara.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="page-header" align="center"><h1>Pesanan Anda</h1></div>

            <form method="post">

                <table class="table table-striped">
                    <thead>
                    <th>Option</th>
                    <th>kode</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>

                    <th>Sub Total</th>
                    </thead>                   
                    <tbody>

                        <?php
                        if (!isset($_SESSION['cart'])) {
                            die("cart kosong");
                        } elseif (isset($_GET['id_barang'])) {
                            $result = mysqli_query($koneksi, 'SELECT * From master_brg where id_barang=' . $_GET['id_barang']);
                            $product = mysqli_fetch_object($result);
                            $item = new Item();
                            $item->id_barang = $product->id_barang;
                            $item->nama_barang = $product->nama_barang;
                            $item->harga = $product->harga;
                            $item->stock = 1;
                            $_SESSION['cart'] = $item;
                            // check product is existing in cart
                            $index = -1;
                            $cart = unserialize(serialize($_SESSION['cart']));
                            for ($i = 0; $i < count($cart); $i++)
                                if ($cart->id_barang == $_GET['id_barang']) {
                                    $index = $i;
                                    break;
                                }
                            if ($index == -1)
                                $_SESSION['cart'] = $item;
                            else {
                                $cart->stock++;
                                $_SESSION['cart'] = $cart;
                            }
                        }

                        if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
                            $cart = $_SESSION['cart'];
                            $id = $_GET['id_barang'];
                            unset($cart['cart'][$id]);
                            $cart['cart'] = array_values(cart['cart']);
                            $new = $cart;
                            $_SESSION['cart'] = $new;
                            header("location:beli.php");
                        }
                        ?>

                        <tr>
                            <?php
                            $cart = unserialize(serialize($_SESSION['cart']));
                            $s = 0;
                            $index = 0;
                            for ($i = 0; $i < count($cart); $i++) {
                                $s += $cart->harga * $cart->stock;
                                ?>
                                <td><a href="beli.php?action=hapus&id=<?php echo $index; ?>" onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-xs">Delete</a></td>
                                <td><?php echo $cart->id_barang; ?></td>
                                <td><?php echo $cart->nama_barang; ?></td>
                                <td><?php echo $cart->stock; ?></td>
                                <td><?php echo $cart->harga; ?></td>
                                <td><?php echo number_format($cart->harga * $cart->stock); ?></td>
                            </tr>
                        </tbody>

                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="5" align="right">SUM</td>
                        <td align="left"> <?php echo $s; ?>;</td>
                        
                    </tr>
                   
                </table>
            </form>

    </body>
</html>