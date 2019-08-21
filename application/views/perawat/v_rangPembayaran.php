<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Pembayaran</title>

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

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <h1 class="page-header">Rangkuman Pembayaran</h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Rangkuman Pembayaran
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row col-md-6">
                                    <?php 
                                    foreach($no_faktur as $u){ ?>
                                    <div class="col-md-4">
                                        <label>No Fakur</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->no_faktur ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>No Pasien</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->no_pasien ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->nama ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->alamat ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Umur</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->umur ?> tahun</label>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-12">
                                    </br>
                                    <table width="100%" class="table " >
                                        <thead>
                                             
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (is_array($rangPembayaran)){
                                                foreach($rangPembayaran as $u) { ?>
                                            <tr>
                                                <th>Bahan</th>
                                                <td><?php echo $u->nama_bahan; ?></td> 
                                                <td><?php echo $u->jumlah; ?></td>
                                                <td><?php echo number_format($u->harga_jual); ?></td>                   
                                            </tr>
                                            <?php }}
                                            if (is_array($rangkuman)){
                                                foreach($rangkuman as $u) { ?>
                                            <tr>
                                                <th>Jenis Perawatan</th>
                                                <td colspan="2"><?php echo $u->jenis_perawatan; ?></td> 
                                                <td rowspan="2" style="vertical-align: middle;"><?php echo number_format($u->biaya) ; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Regio</th>
                                                <td colspan="2"><?php echo $u->regio; ?></td> 
                                            </tr>
                                            <tr>
                                                <th colspan="3">Total</th> 
                                                <th><?php echo number_format($u->total); ?></th>
                                            </tr>
                                            <?php }}?> 
                                        </tbody>
                                    </table>
                                    
                                </div> 
                                <div class="col-md-12">
                                    <?php
                                    foreach($no_faktur as $u){ ?>
                                    <a href="<?php echo base_url() . 'index.php/perawat/cetakKwitansi/' .$u->no_faktur ; ?>" target="_blank">
                                        <button class="btn btn-warning btn-sm" data-placement="bottom" title="Cetak Kwitansi"> 
                                            <i class="fa fa-print"></i>&nbsp Kwitansi
                                        </button>
                                    </a>
                                    <?php } ?>
                                    <a href="<?php echo base_url('index.php/perawat/daftarAntrian'); ?>">
                                        <button class="btn btn-success btn-sm" data-placement="bottom" title="Selesai"> 
                                            <i class="fa fa-check"></i>&nbsp Selesai
                                        </button>
                                    </a>
                                </div>       
                            </div>

                        </div>

                    </div>
                    
                </div>
            </div>
            
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container-fluid my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Rafiqah Majidah 2018</span>
                    </div>
                </div>
            </footer>
            <!-- /.site-footer -->
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include 'modal_logout.php'?>
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->  
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>

</body>

</html>
