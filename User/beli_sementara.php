<?php 
session_start();
require 'koneksi.php';
require 'item.php';
if (isset($_GET['id_barang'])) {  
$result = mysqli_query($koneksi,'SELECT * From master_brg where id_barang='.$_GET['id_barang']);
$product = mysqli_fetch_object($result);
  $item = new Item();
  $item->id_barang=$product->id_barang;
   $item->nama_barang=$product->nama_barang;
    $item->harga=$product->harga;
     $item->stock = 1;
     $_SESSION['cart'][] = $item;
     // check product is existing in cart
     $index = -1;
     $cart = unserialize(serialize($_SESSION['cart']));
     for ($i=0; $i <count($cart) ; $i++) 
        if ($cart[$i]->id_barang==$_GET['id_barang']) 
        {
          $index = $i;     
          break;
        }
     if ($index==-1)        
      $_SESSION['cart'][] = $item;
    else{
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

 <table cellpadding="2" cellspacing="2" border="1">
   <tr>
    <th>option</th>
     <th>id</th>
     <th>nama</th>
     <th>harga</th>
     <th>stock</th>
     <th>sub total</th>
   </tr>
   <?php 
   $cart = unserialize(serialize($_SESSION['cart']));
   $s = 0;
   $index = 0;
   for ($i=0; $i <count($cart) ; $i++) {
    $s += $cart[$i]->harga * $cart[$i]->stock;

    ?>
     
     <tr>
      <td><a href="index.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure')"> delete</a></td>
       <td><?php echo $cart[$i]->id_barang; ?></td>
       <td><?php echo $cart[$i]->nama_barang; ?></td>
       <td><?php echo $cart[$i]->harga; ?></td>
       <td><?php echo $cart[$i]->stock; ?></td>
       <td><?php echo $cart[$i]->harga * $cart[$i]->stock; ?></td>
     </tr>
  <?php 
  $index++;
  }
     ?>
  <tr>
    <td colspan="5" align="right">Sum</td>
    <td align="left"><?php echo $s; ?></td>
  </tr>
 </table>
 <br>
 <a href="index.php">Tambah Lagi</a>