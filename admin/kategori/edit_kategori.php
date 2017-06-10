<?php
include 'koneksi.php';
$id_kategori = $_GET['id_kategori'];
$sql = $koneksi->query("select * from kategori_brg where id_kategori ='$id_kategori'");
$x = $sql->fetch_array();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Edit Kategori
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role ="form" action="index.php?page=exe_edit_kategori" method="post">

                            <div class="form-group">
                                <label>kategori</label>
                                <input type="hidden" class="form-control"
                                       placeholder="Kategori" name="id_kategori"
                                       required="" value="<?php echo $x['id_kategori'];
?>">
                                <input type="text" class="form-control"
                                       placeholder="Kategori" name="nama_kategori"
                                       required="" value="<?php echo $x['nama_kategori'];
?>">
                            </div>

                            <input type="submit" name="simpan" value="simpan" class="btn btn-success"">

                            <input type="button" name="batal" value="batal" class="btn btn-danger" onClick="
                                    javascript:history.back()">
                        </form>		 			
                    </div>

                </div>
                <!-- /. row (nested)-->
            </div>	
            <!-- /. panel-body-->
        </div>
        <!-- /. panel-->
    </div>
    <!-- /.col-lg-12-->
</div>
<!-- /. row-->
