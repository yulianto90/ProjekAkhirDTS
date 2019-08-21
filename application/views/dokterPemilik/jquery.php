<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         $('#dataTables-example').dataTable();
        
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/dokterPemilik/tampilPasien',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].no_pasien+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].tgl_lahir+'</td>'+
                                '<td>'+data[i].riwayat_alergi+'</td>'+
                                '<td>'+data[i].penyakit+'</td>'+
                                '<td>'+data[i].no_hp+'</td>'+
                                '<td style="text-align:right;">'+
                                '<a href="javascript:;"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Pasien" data="'+data[i].no_pasien+'"> <i class="fa fa-folder-open-o"></i> </button></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(barang_kode, barang_nama, barang_harga){
                        $('#ModalaEdit').modal('show');
                        $('[name="kobar_edit"]').val(data.barang_kode);
                        $('[name="nabar_edit"]').val(data.barang_nama);
                        $('[name="harga_edit"]').val(data.barang_harga);
                    });
                }
            });
            return false;
        });
 
 
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var kobar=$('#kode_barang').val();
            var nabar=$('#nama_barang').val();
            var harga=$('#harga').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/simpan_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar"]').val("");
                    $('[name="nabar"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Update Barang
        $('#btn_update').on('click',function(){
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/hapus_barang')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });
 
    });
</script>