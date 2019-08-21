<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Antrian</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <li class="active">
                            <a class="active" href="<?php echo base_url('index.php/Dokter'); ?>"><i class="fa fa-tasks fa-fw"></i> Antrian Pasien</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/Dokter/daftarPasien'); ?>"><i class="fa fa-table fa-fw"></i> Pasien</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/Dokter/daftarStokBahan'); ?>"><i class="fa fa-th-list fa-fw"></i> Bahan</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pendapatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/Dokter/daftarPendapatanPribadi'); ?>">Pendapatan Pibadi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/Dokter/gaji'); ?>">Gaji</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
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
                                Antrian Pasien
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <button class="btn btn-danger btn-sm"></button> 
                                        <label>Menunggu  </label>
                                        <button class="btn btn-warning btn-sm"></button> 
                                        <label>Proses Perawatan  </label> 
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
                                                    <a href="<?php echo base_url() . 'index.php/Dokter/statusPerawatan/' .$u->no_pasien ; ?>" >
                                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Perawatan"> 
                                                            <i class="fa fa-plus-circle"></i>&nbsp Perawatan
                                                        </button>
                                                    </a>
                                                    </form>
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
                                                <div>
                                                    <a href="<?php echo base_url() . 'index.php/Dokter/pasienPerawatan/' .$u->no_pasien ; ?>">
                                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat"> 
                                                            <i class="fa fa-user"></i>&nbsp Lihat
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

</body>

</html>
