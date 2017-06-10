<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Input Akun
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role ="form" action="index.php?page=exe_input_akun"
                              method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="Email" class="form-control" placeholder="Email" name="email" required="">
                            </div>		 				
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control"	placeholder="Username" name="username" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Password" name="password" required="">
                                <input type="hidden" name="level" class="form-control" value="user">
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
