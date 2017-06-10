<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Input Kategori
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role ="form" action="index.php?page=exe_input_kategori"
                              method="post">

                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control"
                                       placeholder="kategori" name="nama_kategori"
                                       required="">
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
