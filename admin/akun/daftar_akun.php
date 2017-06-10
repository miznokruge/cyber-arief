<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="index.php?page=input_akun" method="post">
                    <input type="submit" value="tambah user" class="btn btn-default">
                </form> 
            </div>
            <!--/.panel heading-->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th >No.</th>
                                <th >Email</th>
                                <th >Username</th>
                                <th >Password</th>
                                <th >Level</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //query di database untuk mengetahui apakah ada data di database 
                            $result = $koneksi->query("select * from admin");
                            $no = 1;
                            while ($r = $result->fetch_array()) {
                                echo
                                //menandakan variabel titik yang d samping tbody

                                "<tr class= warning>" .
                                "<td>$no</td>" .
                                "<td>" . $r['email'] . "</td>" .
                                "<td>" . /* strtoupper */($r['username']) . "</td>" .
                                "<td>" . $r['password'] . "</td>" . /* strtoupper untung membuat huruf kapital semua */
                                "<td class=center>" . strtoupper($r['level']) . "</td>" .
                                "<td class=center><a href='index.php?page=edit_akun&amp;id_admin=$r[id_admin]'><p class ='glyphicon glyphicon-edit'></p></a>" . " || " .
                                "<a href=index.php?page=delete_akun&amp;id_admin=$r[id_admin]><p class='fa fa-times'></p></a>" .
                                "</td>" .
                                "</tr>"
                                ;
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /. table-responsive-->
            </div>
        </div>
    </div>
</div>