<?php
include 'koneksi.php';
$id_admin = $_GET['id_admin'];
$db = $koneksi->query("select * from admin where id_admin ='$id_admin'");
$x = $db->fetch_array();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Input Akun
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role ="form" action="index.php?page=exe_edit_akun" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="hidden" class="form-control" placeholder="email" name="email"
                                       required="" value="<?php echo $x['email']; ?>">
                                <input type="text" class="form-control"
                                       placeholder="email" name="email" required="" value="<?php echo $x['email'];
?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" class="form-control" placeholder="Username" name="id_admin"
                                       required="" value="<?php echo $x['id_admin']; ?>">
                                <input type="text" class="form-control"
                                       placeholder="Username" name="username" required="" value="<?php echo $x['username'];
?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Password" name="password" required=""  value="<?php echo $x['password']; ?>">
                                <input type="hidden" name="level" class="form-control" value="user">
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
