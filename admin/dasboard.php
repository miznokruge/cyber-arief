<?php include '../koneksi.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php
                                    $query = mysqli_query($koneksi, "SELECT * from transaction_details");
                                    $data = mysqli_fetch_all($query);
                                    echo count($data);
                                    ?></div>
                                <div>Laporan</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> 
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * from transactions");
                                    $data = mysqli_fetch_all($query);
                                    echo count($data);
                                    ?>
                                </div>
                                <div>Transaksi</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * from master_brg");
                                    $data = mysqli_fetch_all($query);
                                    echo count($data);
                                    ?></div>
                                <div>Barang</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=daftar_barang">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php
                                    $query = mysqli_query($koneksi, "SELECT * from admin");
                                    $data = mysqli_fetch_all($query);
                                    echo count($data);
                                    ?></div>
                                <div>User</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=daftar_akun">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>  PERFECT
    </div>
    <div class="panel-heading">
        <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>    VERY GOOD
    </div>
    <div class="panel-heading">
        <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>  NICE
    </div>
    <div class="panel-heading">
        <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>     NOT BAD
    </div>
    <div class="panel-heading">
        <i class="fa fa-star-o fa-fw"></i>   BAD
    </div>
</div>
