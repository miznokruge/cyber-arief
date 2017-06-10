<?php
include 'koneksi.php';
$id_barang = $_GET['id_barang'];
$sql = $koneksi->query("SELECT * from kategori_brg INNER JOIN master_brg ON kategori_brg.id_kategori=master_brg.id_kategori where id_barang='$id_barang' ") or die(mysql_error());
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
                        <form role ="form" action="index.php?page=exe_edit_barang" method="post">
                            <input type="hidden" class="form-control" placeholder="Subkategori" name="id_barang" required="" value="<?php echo strtoupper($x['id_barang']); ?>">
                            <div class="form-group">
                                <label>Selects Kategori</label>
                                <select class='form-control' name="id_kategori" required="">
                                    <option value="<?php echo $x['id_kategori']; ?>"><?php echo strtoupper($x['nama_kategori']); ?></option>
                                    <?php
                                    $result = $koneksi->query("select * from kategori_brg") or die(mysql_error());
                                    $no = 1;
                                    while ($r = $result->fetch_array()) {
                                        echo
                                        "<option value='$r[id_kategori]'>" . strtoupper($r['nama_kategori']) . "</option>";
                                        $no++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control"
                                       placeholder="Kode Barang" name="kode_barang"
                                       required="" autocomplete="off" value="<?php echo strtoupper($x['kode_barang']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" class="form-control"
                                       placeholder="Merk" name="merk"
                                       required="" autocomplete="off" value="<?php echo strtoupper($x['merk']); ?>">
                            </div>                      
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control"
                                       placeholder="Nama Barang" name="nama_barang"
                                       required="" autocomplete="off" value="<?php echo strtoupper($x['nama_barang']); ?>">
                            </div>

                            <label>Harga Jual</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="harga" class="form-control" value="<?php echo strtoupper($x['harga']); ?>">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" class="form-control"
                                       placeholder="0" name="stock"
                                       required="" autocomplete="off" value="<?php echo strtoupper($x['stock']); ?>">                           
                            </div>
                            <input type="submit" name="simpan" value="simpan" class="btn btn-success">

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




