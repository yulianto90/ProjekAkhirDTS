<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS-Pengeluaran Bahan</title>

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
                                    <a class="active" href="<?php echo base_url('index.php/dokterPemilik/daftarPengeluaran'); ?>"> Pengeluaran Bahan</a>
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
                        <h1 class="page-header">Pengeluaran Bahan</h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a data-toggle="modal" data-target="#modal_bahanLama">
                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Bahan Lama"> 
                                <i class="fa fa-plus"></i>&nbsp Bahan Lama
                            </button>
                        </a>
                        <a data-toggle="modal" data-target="#modal_bahanBaru">
                            <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Bahan Baru"> 
                                <i class="fa fa-plus"></i>&nbsp Bahan Baru
                            </button>
                        </a>
                    </div>
                </div></br>
                <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Pengeluaran Bahan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="pull-left row col-lg-6">
                                <form action="<?php echo base_url('index.php/dokterPemilik/daftarPengeluaran');?>" method="get">
                                    <label>
                                        <select class="form-control" name="bulan">
                                            <option value="0">Bulan</option>
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
                                    <label>
                                        <select class="form-control" name="tahun" >
                                            <option value="0">Tahun</option>
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
                                    <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cetak No Antrian"> 
                                            <i class="fa fa-search"></i>
                                    </button> 
                                </form>
                            </div>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No  </th>
                                        <th>Tanggal </th>
                                        <th>Kode  </th>
                                        <th>Nama </th>
                                        <th>Jumlah </th>
                                        <th>Harga Pokok </th>
                                        <th>Total </th>
                                        <th>Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                    if (is_array($pengeluaran)){
                                    foreach($pengeluaran as $u){ ?>
                                        <td><?php echo $u->no_pengeluaran ?></td>
                                        <td><?php echo format_tgl($u->tanggal) ?></td>
                                        <td><?php echo $u->kode_bahan ?></td>
                                        <td><?php echo $u->nama_bahan ?></td>
                                        <td><?php echo $u->jumlah ?></td>
                                        <td><?php echo number_format($u->harga_pokok) ?></td>
                                        <td><?php echo number_format($u->total) ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php
                                              echo anchor("/dokterPemilik/hapusPengeluaranBahan/" .$u->no_pengeluaran,'<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Pengeluaran Bahan"><i class="fa fa-trash"></i></button></a>', array('class'=>'delete','onclick'=>'return confirmDialog();'));
                                            ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }} else { ?>
                                    <tr><td colspan="8" align="center">Tidak ada data</td></tr>
                                    <?php } ?>                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th colspan="1"> </th>
                                        <th colspan="1"> </th>
                                    </tr>
                                </tfoot>
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
    <!-- ============ MODAL BAHAN LAMA =============== -->
    <div class="modal fade" id="modal_bahanLama" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Bahan Lama</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/dokterPemilik/tambahPengeluaran'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <label>Nama Bahan</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cmb_dinamis('kode_bahan', 'stok_bahan', 'nama_bahan', 'kode_bahan', null, 'isi_otomatis()', 'kode_bahan' ); ?></br>
                                    <input class="form-control"  name="nama_bahan" id="nama_bahan" type="hidden" readonly="">
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="jumlah" id="jumlah" type="text" required="" onkeyup="total_harga()"></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Satuan</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="satuan" id="satuan" type="text" readonly=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Harga Pokok</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="harga_pokok" id="harga_pokok" type="text" readonly=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="total" id="total" type="text" readonly=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="tanggal" id="tanggal" type="date" required="">
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
    <!--END MODAL BAHAN LAMA-->

    <!-- ============ MODAL BAHAN BARU =============== -->
    <div class="modal fade" id="modal_bahanBaru" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Bahan Baru</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/dokterPemilik/tambahStokBahan'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <label>Nama Bahan</label>
                                </div>
                                <div class="col-md-8">
                                   <input class="form-control" name="nama_bahan" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Stok Minimal</label>
                                </div>
                                <div class="col-md-8">
                                   <input class="form-control" name="stok_minimal" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Satuan</label>
                                </div>
                                <div class="col-md-8">
                                   <?php echo cmb_dinamis('no_satuan', 'satuan_bahan', 'satuan', 'no_satuan', null, null, ''); ?></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Perawatan</label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo cmb_dinamis('no_perawatan', 'perawatan', 'jenis_perawatan', 'no_perawatan', null, null, ''); ?></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Harga Pokok</label>
                                </div>
                                <div class="col-md-8">
                                   <input class="form-control" name="harga_pokok1" id="harga_pokok1" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Harga Jual</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="harga_jual" type="text" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Expired</label>
                                </div>
                                <div class="col-md-8">
                                   <input class="form-control" name="expired" type="date" placeholder="...." required=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Jumlah</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="jumlah1" id="jumlah1" type="text" required="" onkeyup="total_harga1()"></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="total1" id="total1" type="text" readonly=""></br>
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="tanggal" id="tanggal" type="date" required="">
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
    <!--END MODAL BAHAN BARU-->
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
    function isi_otomatis() {
        var kode_bahan = $("#kode_bahan").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/dokterPemilik/form_pengeluaran_autocomplit",
            type: "GET",
            data: "kode_bahan=" + kode_bahan,
        success: function (data) {
                var json = data,
                obj = JSON.parse(json);
                $("#nama_bahan").val(obj.nama_bahan);
                $("#satuan").val(obj.satuan);
                $("#stok").val(obj.stok);
                $("#harga_pokok").val(obj.harga_pokok);
            }
        });
    }

    function total_harga() {
        var jumlah = document.getElementById('jumlah').value;
        var harga_pokok = document.getElementById('harga_pokok').value;
        var total = jumlah * harga_pokok;
        document.getElementById('total').value = total;
    }

    function total_harga1() {
        var jumlah = document.getElementById('jumlah1').value;
        var harga_pokok = document.getElementById('harga_pokok1').value;
        var total = jumlah * harga_pokok;
        document.getElementById('total1').value = total;
    }

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 0 ).footer() ).html('Total Pengeluaran Bahan');
            $( api.column( 6 ).footer() ).html(
                'Rp '+  Intl.NumberFormat('en-US').format(pageTotal) +' </br>('+  Math.ceil(pageTotal/total*100) +'% dari total Rp ' + Intl.NumberFormat('en-US').format(total) +')' );
            
        },            
            responsive: true,
            bLengthChange: false
        });
    });

    function confirmDialog(){
      return confirm('Apakah anda yakin akan menghapus data ini?')
    }


    </script>

</body>

</html>
