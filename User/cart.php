<?php 
@session_start();
?>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h2><b>Belanjaan Anda</b></h2></center>
            </div>
            <!--/.panel heading-->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered
                           table-hover" >
                        <thead>
                            <tr>
                                <th>No.</th>                                        
                                <th>Merk Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga / item</th>
                                <th>Kode Barang</th>
                                <th>Membeli</th>
                                <th>Total Harga</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            //query di database menampilkan data

                            include ('koneksi.php');

                            $result = $koneksi->query("SELECT * from master_brg where status = 1");
                            $no = 1;
                            while ($r = $result->fetch_array()) {
                                echo
                                //menandakan variabel titik yang d samping tbody

                                "<tr class=success>" .
                                "<td>$no</td>" .
                                "<td>" . strtoupper($r['merk']) . "</td>" .
                                "<td>" . strtoupper($r['nama_barang']) . "</td>" .
                                "<td>" . strtoupper($r['harga']) . "</td>" .
                                "<td>" . strtoupper($r['kode_barang']) . "</td>" .
                                "<td>" . strtoupper($r['dibeli']) . "</td>" .
                                "<td>" . strtoupper($r['harga'] * $r['dibeli']) . "</td>" .

                                "<td class=center><a href='cancel.php?id_barang=$r[id_barang]'>Cancel <p class ='glyphicon  glyphicon-log-in'></p></a>".
                                "</tr>"
                                ;
                                $no++;
                            }
                            ?>
                            </tr>
                            </tbody>
                            <tr>
                                <td colspan="6" align="right">Jumlah</td>
                                <td colspan="6"><?php echo $i; ?></td>
                            </tr>
                        <tbody>
                    </table>
                </div>
                <!-- /. table-responsive-->
                <button onclick="location.href='buy.php'" >Buy Now !!!</button>
                <button onclick="location.href='index.php'" >Tambah !!!</button>
            </div>
             </div>
             </div>
