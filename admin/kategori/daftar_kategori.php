<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="index.php?page=input_kategori" method="post">
                    <input type="submit" value="tambah kategori" class="btn
                           btn-default">
                </form> 
            </div>
            <!--/.panel heading-->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered
                           table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>

                                <th width="25%">kategori</th>

                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //query di database menampilkan data
                            $result = $koneksi->query("select * from kategori_brg");
                            $no = 1;
                            while ($r = $result->fetch_array()) {
                                echo
                                //menandakan variabel titik yang d samping tbody

                                "<tr class=warning>" .
                                "<td>$no</td>" .
                                "<td>" . strtoupper($r['nama_kategori']) . "</td>" .
                                "<td class=center><a href='index.php?page=edit_kategori&amp;id_kategori=$r[id_kategori]'><p class ='glyphicon glyphicon-edit'></p></a>" . " || " .
                                "<a href=index.php?page=delete_kategori&amp;id_kategori=$r[id_kategori]><p class='fa fa-times'></p></a>" .
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