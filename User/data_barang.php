    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h2><b>Sistem Aplikasi Kasir</b></h2></center>
            </div>
            <!--/.panel heading-->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered
                           table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>										
                                <th>Merk Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga </th>
                                <th>Kode Barang </th>
                                <th>Stock</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //query di database menampilkan data
                            $result = $koneksi->query("select * from master_brg where stock != 0");
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
                                "<td>" . strtoupper($r['stock']) . "</td>" .
                                "<td class=center><a href='tambah.php?id_barang=$r[id_barang]'><p class ='glyphicon  glyphicon-log-in'></p></a>".
                                "</tr>"
                                ;
                                $no++;
                            }
                            ?>
                        <tbody>
                    </table>
                </div>
                <!-- /. table-responsive-->
            </div>
        </div>
    </div>
