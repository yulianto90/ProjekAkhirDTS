<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Gaji Pegawai</title>

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
                            <a href="<?php echo base_url('index.php/dokterPemilik/daftarStokBahan'); ?>"><i class="fa fa-th-list fa-fw"></i> Bahan</a>
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
                                    <a class="active" href="<?php echo base_url('index.php/dokterPemilik/gaji'); ?>"> Gaji Pegawai</a>
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
                        <h1 class="page-header"> Gaji Pegawai</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gaji Dokter
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <label>Bulan
                                    <select class="form-control" name="bulan" id="bulan">
                                        <option value="0">Show All</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="12">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </label>
                                <label>Tahun
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option value="0">Show All</option>
                                        <?php
                                        $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2010; $x--) {
                                        ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </label>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dokter">
                                    <thead>
                                        <tr>
                                            <th>Nama Dokter</th>
                                            <th>Tanggal</th>
                                            <th>Gaji</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gaji Perawat
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <label>Bulan
                                    <select class="form-control" name="bulan1" id="bulan1">
                                        <option value="0">Show All</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="12">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </label>
                                <label>Tahun
                                    <select class="form-control" name="tahun1" id="tahun1">
                                        <option value="0">Show All</option>
                                        <?php
                                        $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2010; $x--) {
                                        ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </label>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="perawat">
                                    <thead>
                                        <tr>
                                            <th>Nama Perawat</th>
                                            <th>Tanggal</th>
                                            <th>Gaji</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>              
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
            order: [[3, 'asc']]
        });
    });

    </script>
    <script>
        $(document).ready(function() {
          //jika data sudah siap maka akan dijalangkan
            dokter();
            $("#bulan").change(function(){
                $("#tahun").change(function(){
                    // ini dijalankan ketika ada event dari combo box
                    dokter();
                });
            });
        });

        function dokter() {
          var bulan = $("#bulan").val();
          var tahun = $("#tahun").val();
          $.ajax({
            url : "<?= base_url('index.php/dokterPemilik/showGajiDokter') ?>",
            data: "bulan="+bulan+"&tahun="+tahun,
            success:function(data) {
              $("#dokter tbody").html(data);
            }
          });
        };

        $(document).ready(function() {
          //jika data sudah siap maka akan dijalangkan
            perawat();
            $("#bulan1").change(function(){
                $("#tahun1").change(function(){
                    // ini dijalankan ketika ada event dari combo box
                    perawat();
                });
            });
        });

        function perawat() {
          var bulan = $("#bulan1").val();
          var tahun = $("#tahun1").val();
          $.ajax({
            url : "<?= base_url('index.php/dokterPemilik/showGajiPerawat') ?>",
            data: "bulan="+bulan+"&tahun="+tahun,
            success:function(data) {
              $("#perawat tbody").html(data);
            }
          });
        }
    </script>

</body>

</html>
