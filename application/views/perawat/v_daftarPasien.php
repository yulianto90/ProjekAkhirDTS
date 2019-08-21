<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Pasien</title>

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
                            <a class="active" href="<?php echo base_url('index.php/perawat/'); ?>"><i class="fa fa-table fa-fw"></i> Pasien</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/perawat/daftarAntrian'); ?>"><i class="fa fa-tasks fa-fw"></i> Antrian Pasien</a>
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
                        <h1 class="page-header">Pasien</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a data-toggle="modal" data-target="#modal_pasienBaru">
                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Pasien Baru"> 
                                <i class="fa fa-plus"></i>&nbsp Pasien Baru
                            </button>
                        </a>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pasien Terdaftar
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No Pasien</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Riwayat Alergi</th>
                                            <th>Penyakit</th>
                                            <th>No Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php
                                        foreach($pasien as $u){ ?>
                                          <td><?php echo $u->no_pasien ?></td>
                                          <td><?php echo $u->nama ?></td>
                                          <td><?php echo format_tgl($u->tgl_lahir) ?></td>
                                          <td><?php echo $u->riwayat_alergi ?></td>
                                          <td><?php echo $u->penyakit ?></td>
                                          <td><?php echo $u->no_hp ?></td>
                                          <td>
                                            <a data-toggle="modal" data-target="#modal_tambahAntrian<?php echo $u->no_pasien ?>">
                                                <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Tambah Antrian"> 
                                                    <i class="fa fa-plus"></i> 
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url() . 'index.php/perawat/cetakKartu/' .$u->no_pasien ; ?>" target="_blank">
                                                <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cetak Kartu Berobat"> 
                                                    <spam class="glyphicon glyphicon-credit-card"></span>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url() . 'index.php/perawat/cetakRekamMedis/' .$u->no_pasien ; ?>" target="_blank">
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cetak Rekam Medis"> 
                                                     <i class="fa fa-print"></i> 
                                                </button>
                                            </a>
                                          </td>
                                        </tr>
                                        <?php } ?>                
                                    </tbody>
                                </table>
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
    <!-- ============ MODAL PASIEN BARU =============== -->
    <div class="modal fade" id="modal_pasienBaru" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Pasien Baru</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/perawat/tambahPasien'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="col-md-5">
                                    <label>Nama</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="nama" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="tgl_lahir" id="tgl_lahir" type="date" placeholder="...."required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="alamat" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>Pekerjaan</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="pekerjaan" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>Riwayat Alergi</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="riwayat_alergi" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>Penyakit</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="penyakit" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-5">
                                    <label>No Hp</label>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control" name="no_hp" type="text" placeholder="...." required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--END MODAL PASIEN BARU-->

    <!-- ============ MODAL TAMBAH ANTRIAN =============== -->
    <?php
        foreach($pasien as $u){ ?>
    <div class="modal fade" id="modal_tambahAntrian<?php echo $u->no_pasien ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Antrian</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/perawat/tambahAntrian/' .$u->no_pasien ; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                <input type="hidden" name="no_pasien" value="<?php echo $u->no_pasien ?>">
                                <div class="col-md-4">
                                    <label>Keluhan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="keluhan" class="form-control" type="text area" placeholder="...." required></textarea> </br>
                                </div>
                                <div class="col-md-4">
                                    <label>Dokter</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cmb_dinamis('username', 'dokter', 'nama_dokter', 'username', null, null, "" ); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php } ?>
    <!--END MODAL TAMBAH ANTRIAN-->
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
