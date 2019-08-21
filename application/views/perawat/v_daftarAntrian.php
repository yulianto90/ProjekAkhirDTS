<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Antrian Pasien</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include 'nav_top.php'?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('index.php/perawat/'); ?>"><i class="fa fa-table fa-fw"></i> Pasien</a>
                        </li>
                        <li class="active">
                            <a class="active" href="<?php echo base_url('index.php/perawat/daftarAntrian'); ?>"><i class="fa fa-tasks fa-fw"></i> Antrian Pasien</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa fa-th-list fa-fw"></i> Daftar Harga<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/perawat/daftarStokBahan'); ?>">Bahan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/perawat/daftarPerawatan'); ?>">Perawatan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/perawat/daftarPengeluaran'); ?>"> <i class="fa fa-edit fa-fw"></i> Pengeluaran Bahan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/perawat/gaji'); ?>"><i class="fa fa-stack-overflow fa-fw"></i> Gaji</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Antrian Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Antrian Berjalan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <a href="<?php echo base_url('index.php/perawat/resetAntrian')?>">
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Reset Antrian"> 
                                                <i class="fa fa-refresh"></i>&nbsp Reset
                                            </button>
                                        </a> 
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-danger btn-sm"></button> 
                                        <label>Menunggu  </label>
                                        <button class="btn btn-warning btn-sm"></button> 
                                        <label>Proses Perawatan  </label>
                                        <button class="btn btn-success btn-sm"></button> 
                                        <label>Pembayaran</label> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <?php 
                                if (is_array($antrian)){
                                    foreach($antrian as $u) {?>
                                    <div class="col-md-3">
                                        </br>
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <label class="text-center"> No antrian : <?php echo $u->no_antrian ?></label>
                                            </div>
                                            <div class="panel-body">
                                                <label>No Pasien: <?php echo $u->no_pasien ?></label></br>
                                                <label>Nama: <?php echo $u->nama ?></label>
                                            </div>
                                            <div class="panel-footer">
                                                <label>Dokter: <?php echo $u->username ?></label>
                                                <div>
                                                    <a href="<?php echo base_url() . 'index.php/perawat/cetakAntrian/' .$u->no_antrian ; ?>" target="_blank">
                                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cetak No Antrian"> 
                                                            <i class="fa fa-print"></i>&nbsp Cetak
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php 
                                    }
                                } ?>
                                </div>
                                <div class="col-md-12">
                                <?php 
                                if (is_array($perawatan)){
                                    foreach($perawatan as $u) {?>
                                    <div class="col-md-3">
                                        </br>
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <label class="text-center"> No antrian : <?php echo $u->no_antrian ?></label>
                                            </div>
                                            <div class="panel-body">
                                                <label>No Pasien: <?php echo $u->no_pasien ?></label></br>
                                                <label>Nama: <?php echo $u->nama ?></label>
                                            </div>
                                            <div class="panel-footer">
                                                <label>Dokter: <?php echo $u->username ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                    }
                                }
                                ?>
                                </div>
                                <div class="col-md-12">
                                <?php 
                                if (is_array($pembayaran)){
                                    foreach($pembayaran as $u) {?>
                                    <div class="col-md-3">
                                        </br>
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <label class="text-center"> No antrian : <?php echo $u->no_antrian ?></label>
                                            </div>
                                            <div class="panel-body">
                                                <label>No Pasien: <?php echo $u->no_pasien ?></label></br>
                                                <label>Nama: <?php echo $u->nama ?></label>
                                            </div>
                                            <div class="panel-footer">
                                                <label>Dokter: <?php echo $u->username ?></label>
                                                <div>
                                                    <a href="<?php echo base_url() . 'index.php/perawat/pembayaran/' .$u->no_pasien ; ?>" method="post">
                                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Pembayaran"> 
                                                            <i class="fa fa-credit-card"></i>&nbsp Pembayaran
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Antrian Selesai
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No Pasien</th>
                                            <th>Nama</th>
                                            <th>Dokter</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        if (is_array($selesai)){
                                        foreach($selesai as $u) { ?>
                                            <td><?php echo $u->no_pasien; ?></td>
                                            <td><?php echo $u->nama; ?></td>
                                            <td><?php echo $u->username; ?></td>
                                            <td><?php echo $u->waktu; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'index.php/perawat/rangPembayaran/' .$u->no_faktur . '/' .$u->no_pasien ; ?>" target="_blank">
                                                    <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Rangkuman Pembayaran"> 
                                                        <i class="fa fa-list"></i> 
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }}?>        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer">
                <div class="container-fluid my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Rafiqah Majidah 2018</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php include 'modal_logout.php'?>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            bLengthChange: false
        });
    });
    </script>
</body>

</html>
