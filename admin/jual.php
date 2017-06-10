<?php
include('../koneksi.php');
$action = isset($_GET['action']) && $_GET['action'] != '' ? $_GET['action'] : 'index';
$result = $koneksi->query("select * from sales WHERE status=0");
if (isset($_POST['trx']) && $_POST['trx'] == 'tambah') {

    if (count($result->fetch_array()) == 0) {
        //bikin record transaksi baru di sales
        $q = "insert into sales(no,date, customer_id,status) VALUES ('" . $_POST['no'] . "','" . $_POST['date'] . "','" . $_POST['customer_id'] . "',0)";
        if ($koneksi->query($q)) {
            $result = $koneksi->query("select * from sales WHERE status=0");
            $result_fetch = $result->fetch_array();
            $data = $result->fetch_array();
            //create detail sales
            $q2 = "insert into sales_detail(sales_id,barang_id, qty,price) VALUES ('" . $data['id'] . "','" . $_POST['good'] . "','" . $_POST['qty'] . "','" . $_POST['price'] . "')";
            if ($koneksi->query($q2)) {
                header("location:index.php?page=jual");
            } else {
                die(mysqli_errno($link));
            }
        }
    } else {
        $result_fetch = $result->fetch_array()[0];
        //bikin record transaksi baru di sales detail doang
        $q2 = "insert into sales_detail(sales_id,barang_id, qty,price) VALUES ('" . $_POST['sales_id'] . "','" . $_POST['good'] . "','" . $_POST['qty'] . "','" . $_POST['price'] . "')";
        if ($koneksi->query($q2)) {
            header("location:index.php?page=jual");
        } else {
            die(mysqli_errno($link));
        }
    }
}
$customers = $koneksi->query("select * from customer");
$barang = $koneksi->query("select * from goods");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="index.php?page=jual&action=tambah" method="post">
                    <input type="submit" value="tambah barang" class="btn
                           btn-default">
                </form> 
            </div>
            <!--/.panel heading-->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php if ($action == 'index') { ?>
                        <?php if (count($result->fetch_array()) == 0) { ?>
                            transaksi kosong
                            <?php
                        } else {
                            $result = $koneksi->query("select * from sales WHERE status=0");
                            $header = $result->fetch_array();
                            $str = "select* from goods JOIN sales_detail ON goods.id=sales_detail.barang_id WHERE sales_detail.sales_id=" . $header['id'] . "";
                            $salesDetail = $koneksi->query($str);
                            ?>
                            <table class="table">
                                <tr>
                                    <td>
                                        No Transaksi
                                    </td>
                                    <td>
                                        <?php echo $header['no'] ?>
                                    </td>
                                </tr>
                            </table>
                            <table class = "table table-striped table-bordered
                                   table-hover" id = "dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Merk Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga </th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //query di database menampilkan data                           
                                    $no = 1;
                                    $total = 0;
                                    $subtotal = 0;
                                    while ($r = $salesDetail->fetch_array()) {
                                        $subtotal = $r['price']*$r['qty'];
                                        $total += $subtotal;
                                        echo
                                        //menandakan variabel titik yang d samping tbody

                                        "<tr class=success>" .
                                        "<td>$no</td>" .
                                        "<td>" . strtoupper($r['id']) . "</td>" .
                                        "<td>" . strtoupper($r['name']) . "</td>" .
                                        "<td>" . strtoupper($r['price']) . "</td>" .
                                        "<td>" . strtoupper($r['qty']) . "</td>" .
                                        "<td>" . $subtotal . "</td>" .
                                        "</tr>";
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            Total
                                        </td>
                                        <td>
                                            <?php echo number_format($total,2) ?>
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        <?php } ?>
                    <?php } elseif ($action == 'tambah') { ?>
                        <form method="post" action="index.php?page=jual">
                            <input type="hidden" name="trx" value="tambah"/>
                            <table class="table">
                                <?php
                                $jt = $result->fetch_array();
                                if (count($jt) == 0) {
                                    ?>
                                    <tr>
                                        <td>No Transaksi</td><td>: 
                                            <input type="text" name="no"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Transaksi</td><td>: 
                                            <input type="text" name="date"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Customer</td><td>: 
                                            <select name="customer_id">
                                                <?php while ($customer = $customers->fetch_array()) { ?>
                                                    <option value="<?php echo $customer['id'] ?>"><?php echo $customer['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="2"><input type="hidden" name="sales_id" value="<?php echo $jt['id'] ?>"/></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>Nama Barang</td><td>: 
                                        <select name="good">
                                            <?php while ($good = $barang->fetch_array()) { ?>
                                                <option value="<?php echo $good['id'] ?>"><?php echo $good['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Qty</td><td>: 
                                        <input type="text" name="qty"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PRice</td><td>: 
                                        <input type="text" name="price"/>
                                    </td>
                                </tr>

                            </table>
                            <?php
                        } else {
                            //keluarga data barang saja
                        }
                        ?>
                        <button>Submit</button>
                    </form>
                </div>
                <!-- /. table-responsive-->
            </div>
        </div>
    </div>
</div>