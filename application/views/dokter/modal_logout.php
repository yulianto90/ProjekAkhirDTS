    <!-- Logout Modal-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label> Apakah anda yakin untuk keluar?</label>  
                    </div></br>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/Login/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>