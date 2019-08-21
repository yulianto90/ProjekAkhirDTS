<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Bahan</title>

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
                            <a href="<?php echo base_url('index.php/dokterPemilik'); ?>"><i class="fa fa-tasks fa-fw"></i> Antrian Pasien</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/dokterPemilik/daftarPasien'); ?>"><i class="fa fa-table fa-fw"></i> Pasien</a>
                        </li>
                        <li>
                            <a class="active" href="<?php echo base_url('index.php/dokterPemilik/daftarStokBahan'); ?>"><i class="fa fa-th-list fa-fw"></i> Bahan</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pendapatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/dokterPemilik/daftarPendapatanPribadi'); ?>">Pendapatan Pribadi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/dokterPemilik/daftarPendapatan'); ?>">Pendapatan Klinik</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Pengeluaran<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/dokterPemilik/daftarPengeluaran'); ?>"> Pengeluaran Bahan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/dokterPemilik/gaji'); ?>"> Gaji Pegawai</a>
                                </li>
                            </ul>
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
                        <h1 class="page-header">Bahan</h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Edit Stok Bahan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <form action="<?php echo base_url('index.php/dokterPemilik/updateStokBahan'); ?>" method="post">
                                    <?php 
                                    foreach($bahan as $u){ ?>
                                    <input type="hidden" name="kode_bahan" value="<?php echo $u->kode_bahan ?>">
                                    <div class="col-md-4">
                                        <label>Nama Bahan</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="nama_bahan" type="text" value="<?php echo $u->nama_bahan ?>" required=""></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Stok</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="stok" type="text" value="<?php echo $u->stok ?>" readonly></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Stok Minimal</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="stok_minimal" type="text" value="<?php echo $u->stok_minimal ?>" required=""></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Satuan</label>
                                    </div>
                                    <div class="col-md-8">
                                       <?php echo cmb_dinamis('no_satuan', 'satuan_bahan', 'satuan', 'no_satuan', $u->no_satuan, null, ''); ?></br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                        <label>Harga Pokok</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="harga_pokok" type="text" value="<?php echo $u->harga_pokok ?>" required=""></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Harga Jual</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="harga_jual" type="text" value="<?php echo $u->harga_jual ?>" required=""></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Perawatan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php echo cmb_dinamis('no_perawatan', 'perawatan', 'jenis_perawatan', 'no_perawatan', $u->no_perawatan, null, ''); ?></br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Expired</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control" name="expired" type="date" value="<?php echo $u->expired ?>" required=""></br>
                                    </div>
                                    <?php 
                                    } ?>
                                </div>
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <?php echo anchor('dokterPemilik/daftarStokBahan', 'Kembali', array('class' =>"btn btn-danger btn-sm btn-rounded")) ?>
                                    <a>
                                        <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"> 
                                            <i class="fa fa-edit"></i>&nbsp Edit
                                        </button>
                                    </a>
                                </div>
                                </form>
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


</body>

</html>
