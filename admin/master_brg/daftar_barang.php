<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="index.php?page=input_barang" method="post">
                    <input type="submit" value="tambah barang" class="btn
                           btn-default">
                    <a href="laporan/barang.php" target="_blank" class="btn
                           btn-default">
                        Export ke PDF
                    </a>
                </form> 
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //query di database menampilkan data
                            $result = $koneksi->query("select * from master_brg");
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
                                "<td class=center><a href='index.php?page=edit_barang&amp;id_barang=$r[id_barang]'><p class ='glyphicon glyphicon-edit'></p></a>" . " || " .
                                "<a href=index.php?page=delete_barang&amp;id_barang=$r[id_barang]><p class='fa fa-times'></p></a>" .
                                "</td>" .
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
</div>