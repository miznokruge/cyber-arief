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
                                <th>Transaction Id</th>
                                <th>Product Id</th>
                                <th>qty</th>
                                <th>Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //query di database menampilkan data


                            $result = $koneksi->query("SELECT * from transaction_details");
                            $no = 1;
                            while ($r = $result->fetch_array()) {
                                echo
                                //menandakan variabel titik yang d samping tbody

                                "<tr class=success>" .
                                "<td>$no</td>" .
                                "<td>" . strtoupper($r['transaction_id']) . "</td>" .
                                "<td>" . strtoupper($r['product_id']) . "</td>" .
                                "<td>" . strtoupper($r['qty']) . "</td>" .
                                "<td>" . strtoupper($r['jumlah_harga']) . "</td>" .
                                "</tr>"
                                ;
                                $no++;
                            }
                            ?>                        <tbody>
                    </table>
                </div>
                <!-- /. table-responsive-->
            </div>
        </div>
    </div>
