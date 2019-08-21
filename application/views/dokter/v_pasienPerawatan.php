<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Profil Pasien</title>

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
                        <li class="active">
                            <a href="<?php echo base_url('index.php/Dokter'); ?>"><i class="fa fa-tasks fa-fw"></i> Antrian Pasien</a>
                        </li>
                        <li>
                            <a class="active" href="<?php echo base_url('index.php/Dokter/daftarPasien'); ?>"><i class="fa fa-table fa-fw"></i> Pasien</a>
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
                        <h1 class="page-header">Profil Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach($pasien as $u){ ?>
                        <a data-toggle="modal" data-target="#modal_selesai<?php echo $u->no_pasien ?>">
                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selesai"> 
                                <i class="fa fa-check"></i>&nbsp Selesai
                            </button>
                        </a>
                        <?php } ?>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Pribadi Pasien
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <?php 
                                    foreach($pasien as $u){ ?>

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
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo format_tgl($u->tgl_lahir) ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Umur</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->umur ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->alamat ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Pekerjaan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->pekerjaan ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                        <label>Riwayat Alergi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->riwayat_alergi ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Penyakit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->penyakit ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>No Hp</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->no_hp ?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rekam Medis
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                    if (is_array($rekam_medis)){
                                     foreach($rekam_medis as $u){
                                    ?>
                                      <td><?php echo format_tgl($u->tanggal) ?></td>
                                      <td><?php echo $u->keluhan ?></td>
                                      <td><?php echo $u->diagnosa ?></td>
                                      <td><?php echo $u->keterangan ?></td>
                                    </tr>
                                    <?php }} ?>                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
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

    <!-- ============ MODAL SELESAI =============== -->
    <?php
    foreach($pasien as $u){ ?>
    <div class="modal fade" id="modal_selesai<?php echo $u->no_pasien ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Selesai Perawatan</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Dokter/statusSelesai/' .$u->no_pasien ; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                <div class="col-md-4">
                                    <label>Diagnosa-Terapi</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="diagnosa" class="form-control" type="text" placeholder="...." required></textarea> </br>
                                </div>
                                <div class="col-md-4">
                                    <label>Perawatan</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cmb_dinamis('no_perawatan', 'perawatan', 'jenis_perawatan', 'no_perawatan', null, null, "" ); ?></br> 
                                </div>
                                <div class="col-md-4">
                                    <label>Regio</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="regio" class="form-control" type="text" placeholder="...." required></input> </br>
                                </div>
                                <div class="col-md-4">
                                    <label>Keterangan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="keterangan" class="form-control" type="text" placeholder="...." required></textarea> </br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php } ?>
    <!--END MODAL SELESAI-->
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