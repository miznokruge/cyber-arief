<?php include 'koneksi.php';
	if($_GET["cancel"] > 0){//hapus baris keranjang
		$sql = "DELETE FROM transaction_details WHERE id = '$_GET[cancel]'";
		$db->query($sql);
	}
?>
<?php
	$sql="SELECT id FROM transactions";
	$result = $koneksi->query($sql);
	if ($result->num_rows <=0) { // item pertama di keranjang
		$sql="INSERT INTO transactions (id_user,created_at) VALUES ('$__user_id','1',NOW(),'$_SERVER[REMOTE_ADDR]')";
		$koneksi->query($sql);
		$transaction_id = $koneksi->insert_id;
	} else {//sudah ada item di keranjang
		$row = $result->fetch_assoc();
		$transaction_id = $row["id"];
	}


	if($_GET["cancel_belanja"]){//batalkan belanja
		$sql = "DELETE FROM transaction_details WHERE transaction_id = '$transaction_id'";
		$koneksi->query($sql);
		$sql = "DELETE FROM transaction WHERE id = '$transaction_id'";
		$db->query($sql);
		?> <script> window.location = "index.php"; </script> <?php
	}

	if($_POST["product_id"] > 0){//ada proses penambahan ke keranjang
		$product_id = $_POST["product_id"];
		//mencari harga satuan product
		$sql = "SELECT price FROM products WHERE id = '$product_id'";
		$result = $db->query($sql);
		$product = $result->fetch_assoc();
		$price = $product["price"];
		//end mencari harga satuan product

		//cari apakah sudah ada item yang sama di keranjang
		$sql = "SELECT id,qty FROM transaction_details WHERE transaction_id = '$transaction_id' AND product_id = '$product_id'";
		$hsl = $db->query($sql);
		if($hsl->num_rows > 0){ //sudah pernah ada item yang sama di keranjang
			$trx_detail = $hsl->fetch_assoc();
			$trx_detail_id = $trx_detail["id"];
			$curr_qty = $trx_detail["qty"]; //jumlah item yang sedang ada di keranjang
			$qty = $_POST["qty"] + $curr_qty;
			$total = $price * $qty;
			$sql = "UPDATE transaction_details SET qty='$qty',price='$price',total='$total' WHERE id = '$trx_detail_id'";
		} else {//belum pernah ada item yang sama di keranjang
			$qty = $_POST["qty"];
			$total = $price * $qty;
			$sql="INSERT INTO transaction_details (transaction_id,product_id,qty,price,total) VALUES ('$transaction_id','$product_id','$qty','$price','$total')";
		}
		$db->query($sql);
	}
?>
<h1 class="well">Keranjang</h1>
<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>No</th>
	        <th>Barang</th>
	        <th>Jumlah</th>
	        <th>Harga</th>
	        <th>Total</th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$sql = "SELECT * FROM transaction_details WHERE transaction_id = '$transaction_id'";
				$transactions = $db->query($sql);
				if ($transactions->num_rows > 0) {
					$np = 0;
					$TOTAL = 0;
					while($transaction = $transactions->fetch_assoc()) {
						$no++;
						$sql = "SELECT name FROM products WHERE id = '$transaction[product_id]'";
						$result2 = $db->query($sql);
						$row2 = $result2->fetch_assoc();
						$namabarang = $row2["name"];
						$TOTAL += $transaction["total"];
						?>
						<tr>
					        <td><?=$no;?></td>
					        <td><?=$namabarang;?></td>
					        <td align="right"><?=$transaction["qty"];?></td>
					        <td align="right"><?=number_format($transaction["price"]);?></td>
					        <td align="right"><?=number_format($transaction["total"]);?></td>
					        <td><a href="?cancel=<?=$transaction["id"];?>">Cancel</a></td>
					      </tr>
						<?php
					}
					?>
					<tr>
						<td colspan="4" align="right"><b>TOTAL</b></td>
						<td align="right"><?=number_format($TOTAL);?></td>
					</tr>
					<?php
				}
	    	?>
	    </tbody>
	</table>
	<br>
	<table width="100%">
		<tr>
			<td>
				<?php if($TOTAL > 0){ ?>
				<a href="#" onclick="if(confirm('Anda yakin ingin membatalkan belanja?')){window.location='?cancel_belanja=1';}" class="btn btn-primary" role="button">Cancel Belanja</a>
				<?php } ?>
			</td>
			<td align="right">
				<a href="index.php" class="btn btn-primary" role="button">Belanja Lagi</a>
				<?php if($TOTAL > 0){ ?>
				<a href="checkout.php" class="btn btn-primary" role="button">Check Out</a>
				<?php } ?>
			</td>
		</tr>
	</table>
	<br>
</div>
<?php include_once "footer.php"; ?>