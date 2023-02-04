<div>
	<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo "</div>";
}
if ($this->session->flashdata('error')) {
	echo '<p class="alert alert-danger">';
	echo $this->session->flashdata('error');
	echo "</div>";
}
?>
</div>
<p class="pull-right">
	<div class="btn-group pull-right">
		<?php
			if($header_transaksi->status_bayar == true){
			?>
				<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm"><i class="fa fa-backward"></i> Kembali</a> &nbsp; &nbsp;
				<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" title="Cetak" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak </a> &nbsp; &nbsp;
				<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status </a>
			<?php
			}
			if ($header_transaksi->status_bayar == false) {
			?>
				<a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm"><i class="fa fa-backward"></i> Kembali</a> &nbsp; &nbsp;
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayarModal">Bayar</button>
			<?php } ?>
		
	</div>
</p>

<div class="clearfix"></div><hr>

<table class="table table-bordered">
<thead>
	<tr>
		<th width="20%">NAMA PELANGGAN</th>
		<th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
	</tr>
	<tr>
		<th width="20%">KODE TRANSAKSI</th>
		<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Tanggal</td>
		<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
	</tr>
	<?php
		if($header_transaksi->nama_kasir !== null) {	
			?>
				<tr>
					<td>Nama Kasir</td>
					<td>: <?php echo $header_transaksi->nama_kasir ?></td>
				</tr>
			<?php
		}
	?>
	<tr>
		<td>Jumlah total</td>
		<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
	</tr>
	<tr>
		<td>Status Bayar</td>
		<td>: <?php 
			if($header_transaksi->status_bayar == true) {
				echo "Sudah Bayar";
			}else{
				echo "Belum Bayar";
			}
		?></td>
		
	</tr>
	<?php 
			if($header_transaksi->status_bayar == true){
	?>
	<tr>
		<td>Tanggal Bayar</td>
		<td>: <?php 
			if($header_transaksi->tanggal_bayar !== '0000-00-00 00:00:00') {
				echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar));
			} else {
				echo 'Belum Bayar';
			}
		?></td>
	</tr>
	<?php
			}
			if ($header_transaksi->status_bayar == false) {
	?>
	<?php } ?>
	<?php 
			if($header_transaksi->status_bayar == true){
	?>
	<tr>
		<td>Jumlah Bayar</td>
		<td>: Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>
	</tr>
	<?php
			}
			if ($header_transaksi->status_bayar == false) {
	?>
	<?php } ?>
</tbody>
</table>
<br>
<table class="table table-bordered" width="100%">
<thead>
	<tr class="bg-dark">
		<th>NO</th>
		<th>KODE</th>
		<th>NAMA PRODUK</th>
		<th>JUMLAH</th>
		<th>HARGA</th>
		<th>SUB TOTAL</th>
	</tr>
</thead>
<tbody>
	<?php $i=1; foreach ($transaksi as $transaksi) { ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $transaksi->kode_produk ?></td>
		<td><?php echo $transaksi->nama_produk ?></td>
		<td><?php echo number_format($transaksi->jumlah) ?></td>
		<td><?php echo number_format($transaksi->harga) ?></td>
		<td><?php echo number_format($transaksi->total_harga) ?></td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>

<!-- Modal Add Product-->
    <form id="formBayar"action="<?php echo base_url('admin/transaksi/bayar/'.$header_transaksi->kode_transaksi) ?>" method="post">
        <div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Kode Transaksi : </label> 
                    <input type="text" class="form-control" name="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo $header_transaksi->kode_transaksi ?>" required>
                </div>
                 
                <div class="form-group">
                    <label>Tanggal Bayar: </label>
                    <input type="datetime-local" class="form-control" name="tanggal_bayar" placeholder="Tanggal Transaksi" required>
                </div>

                <div class="form-group">
                    <label>Nama Pelanggan : </label> 
                    <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $header_transaksi->nama_pelanggan ?>" required>
                </div>
                 
                <div class="form-group">
                    <label>No. Meja : </label>
                    <input type="text" class="form-control" name="nama_meja" placeholder="No. Meja" value="<?php echo $header_transaksi->nama_meja ?>" required>
                </div>
 
 				<div class="form-group">
                    <label>TOTAL : </label> 
                    <input type="text" id="total" class="form-control" name="jumlah_transaksi" placeholder="Total" value="<?php echo $header_transaksi->jumlah_transaksi ?>" required>
                </div>
                 
                <div class="form-group">
                    <label>Diskon (%) : </label>
                    <input min='0' max="100" type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="diskon" class="form-control" name="diskon" placeholder="Diskon" value="<?php echo $header_transaksi->diskon ?>">
                </div>
 				
 				<div class="form-group">
                    <label>GRAND TOTAL : </label> 
                    <input type="number" min="0" id="grandtotal" class="form-control" name="grandtotal" placeholder="Grand Total" value="<?php echo $header_transaksi->jumlah_transaksi ?>" readonly>
                </div>
                 
                <div class="form-group">
                    <label>Bayar : </label>
                    <input min='0' type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="bayar" class="form-control" name="bayar" placeholder="Bayar" value="<?php echo $header_transaksi->jumlah_bayar ?>">
                </div>
 
                <div class="form-group">
                    <label>Kembali : </label>
                    <input type="text" id="bayarkembali" class="form-control" name="kembali" placeholder="Kembali" value="<?php echo $header_transaksi->kembali ?>" readonly>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 <script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
 <script>
 $( document ).ready(function() {
    if($("#diskon").val() !== 0) {
    	let diskon = $("#total").val()*($("#diskon").val()/100)
    	$("#grandtotal").val($("#total").val()-diskon)
    }
 });
 $('#diskon').on('change', function(event) {
 	if (event.target.value > 100) {
 		$("#diskon").val(100);
 		var diskon = 100;
 	} else {
 		var diskon = event.target.value
 	}
	diskon = diskon / 100;
	console.log(diskon)
	let total = $("#total").val()
 	let countGrand = total*diskon;
 	if(countGrand < 0) {
 		$('#grandtotal').val(0);
 		event.target.value = $('#total').val();
 	} else {
 		$('#grandtotal').val($('#total').val()-($('#total').val()*diskon));
 	}
 });

 $("#bayar").on('change', function(event) {
 	if($('#grandtotal').val() !== '') {
 		if(event.target.value < $("#grandtotal").val() || $('#bayarkembali').val() < 0) {
 			alert("bayar kurang woi");
 			$("#bayar").val(0);
 			$('#bayarkembali').val(0)
 		} else {
 			$('#bayarkembali').val(event.target.value - $('#grandtotal').val());
 		}
 	} else {
 		alert('grand total belum di isi');
 	}
 })
 </script>