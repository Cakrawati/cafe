 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $merchandise->id_merchandise ?>">
     <i class="fa fa-trash-o"></i> Hapus
 </button>

 <div class="modal fade" id="delete-<?php echo $merchandise->id_merchandise ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">HAPUS DATA PRODUK</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="callout callout-warning">
           	  <h4>Peringatan!</h4>
	          Yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
          <a href="<?php echo base_url('admin/merchandise/delete/'.$merchandise->id_merchandise) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
