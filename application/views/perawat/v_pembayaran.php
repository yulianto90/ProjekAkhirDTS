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
                        <h1 class="page-header">Pembayaran</h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Rangkuman Perawatan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <?php 
                                    foreach($pembayaran as $u){ ?>
                                    <div class="col-md-4">
                                        <label>Nama Pasien</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->nama ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Perawatan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->jenis_perawatan ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Regio</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->regio ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label>: <?php echo $u->keterangan ?></label>
                                    </div>
                                    <?php } ?>
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Daftar Bahan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode Bahan</th>
                                            <th>Nama Bahan </th>
                                            <th>Jenis Perawatan</th>
                                            <th>Harga_jual </th>
                                            <th>Add to Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php
                                        foreach($bahan as $u){ ?>
                                            <td><?php echo $u->kode_bahan;?></td>    
                                            <td><?php echo $u->nama_bahan;?></td>
                                            <td><?php echo $u->jenis_perawatan;?></td>
                                            <td><?php echo number_format($u->harga_jual);?>

                                            <input type="hidden" name="quantity" id="<?php echo $u->kode_bahan;?>" value="1" class="quantity form-control"></td>
                                            <td>
                                                <?php 
                                                if ($u->stok > 0) { ?>
                                                   <button class="add_cart btn btn-success btn-sm" data-produkid="<?php echo $u->kode_bahan;?>" data-produknama="<?php echo $u->nama_bahan;?>" data-produkharga="<?php echo $u->harga_jual;?>">Add To Cart</button>
                                                <?php } 
                                                else if ($u->stok == 0) { ?>
                                                    <button class="add_cart btn btn-danger btn-sm disabled">Add To Cart</button>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Pembayaran
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Bahan</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detail_cart">
                                        </tbody>
                                        <tr>
                                        <?php
                                        foreach($perawatan as $u){ ?>
                                            <th colspan="2">Biaya Perawatan</th>
                                            <td colspan="1"><?php echo $u->jenis_perawatan;?></td>
                                            <td colspan="2" class="biayaPerawatan" id="biaya"><?php echo $u->biaya;?></td>
                                        <?php } ?>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Total Akhir</th>
                                            <th colspan="2" id="akhir">0</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Bayar</th>
                                            <th colspan="2"><input class="form-control" type="" name="bayar" id="bayar" onkeyup="kembali()"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Kembali</th>
                                            <th colspan="2"><input class="form-control" type="" name="kembali" id="kembali" readonly=""></th>
                                        </tr>
                                    </table>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-3">
                                        <?php foreach ($pembayaran as $u) { ?>
                                        <a href="<?php echo base_url() . 'index.php/perawat/proses/' .$u->no_faktur. '/' .$u->no_pasien ; ?>">
                                        <?php } ?>
                                            <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Selesai"> 
                                                <i class="fa fa-credit-card"></i>&nbsp Pembayaran
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                bLengthChange: false
            });


            $('#detail_cart').change(function () {
                totalAkhir();
            });


            $('.add_cart').click(function(){
                var produk_id    = $(this).data("produkid");
                var produk_nama  = $(this).data("produknama");
                var produk_harga = $(this).data("produkharga");
                var quantity     = $('#' + produk_id).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/perawat/add_to_cart",
                    method : "POST",
                    data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                    success: function(data){
                        $('#detail_cart').html(data);
                        totalAkhir();
                    }
                });
            });

            // Load shopping cart
            $('#detail_cart').load("<?php echo base_url();?>index.php/perawat/load_cart");

            //Hapus Item Cart
            $(document).on('click','.hapus_cart',function(){
                var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
                $.ajax({
                    url : "<?php echo base_url();?>index.php/perawat/hapus_cart",
                    method : "POST",
                    data : {row_id : row_id},
                    success :function(data){
                        $('#detail_cart').html(data);
                        totalAkhir();
                    }
                });
            });   

            totalAkhir();

            function totalAkhir() {
                var total = $("#total").text();
                if(total===""){total=0;}
                var biayaPerawatan = $("#biaya").text();
                var totalAkhir =  parseInt(total)+parseInt(biayaPerawatan);
                $("#akhir").text(parseInt(totalAkhir));
            }
        });

        function kembali() {
            var total = $(".total").text();
            var biayaPerawatan = $(".biayaPerawatan").text();
            var bayar = document.getElementById('bayar').value;
            var kembali =  parseInt(bayar) - parseInt(total) - parseInt(biayaPerawatan) ;
            document.getElementById('kembali').value = kembali;
        }



    </script>

</body>

</html>
