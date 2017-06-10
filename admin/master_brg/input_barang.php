<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Input Barang
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role ="form" action="index.php?page=exe_input_barang"
                              method="post">
                            <div class="form-group">
                                <label>Select Kategori</label>
                                <select class="form-control" name="id_kategori" required="">
                                    <?php 
                                    $query = mysqli_query($koneksi,"SELECT * FROM kategori_brg");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                      <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option> <?php 
                                    }
                                     ?>

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control"
                                       placeholder="Nama Barang" name="kode_barang"
                                       required="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" class="form-control"
                                       placeholder="Merk" name="merk"
                                       required="" autocomplete="off">
                            </div>                      
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control"
                                       placeholder="Nama Barang" name="nama_barang"
                                       required="" autocomplete="off">
                            </div>

                            <label>Harga Jual</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="harga" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" class="form-control"
                                       placeholder="0" name="stock"
                                       required="" autocomplete="off">                          
                            </div>
                           
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="tgl_publish" value="<?php date_default_timezone_set("Asia/Jakarta");
                                    echo date('d/M/Y-,G:i:s a');
                                    ?>">                                
                            </div>
                            <input type="submit" name="simpan" value="simpan" class="btn btn-success"">
                            <input type="reset" name="reset" value="reset" class="btn btn-warning">
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
