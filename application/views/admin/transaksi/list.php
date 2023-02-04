<table class="table table-bordered" width="100%" id="example1">
<thead>
	<tr class="bg-light">
		<th>NO</th>
		<th>PELANGGAN</th>
		<th>KODE</th>
		<th>TANGGAL</th>
		<th>TOTAL</th>
		<th>QTY</th>
		<th>NO. MEJA</th>
		<th>STATUS</th>
		<th>ACTION</th>
	</tr>
</thead>
<tbody>
	<?php $i=1; foreach ($header_transaksi as $header_transaksi) {?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $header_transaksi->nama_pelanggan ?></td>
		<td><?php echo $header_transaksi->kode_transaksi ?></td>
		<td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
		<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
		<td><?php echo $header_transaksi->total_item ?></td>
		<td><?php echo ($header_transaksi->nama_meja !== '' ? $header_transaksi->nama_meja : 'Belum di set')?></td>
		<td><?php echo ($header_transaksi->status_bayar ? 'Sudah Bayar' : 'Belum Bayar') ?></td>
		<td>
			<div class="btn-group">
				<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail </a>  &nbsp; &nbsp;
				<?php 
					// pengkodisian hak akses level 
					if($this->session->userdata('akses_level') == 1 || $this->session->userdata('akses_level') == 2) {
						if($header_transaksi->status_bayar) {
							?>
								<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>"  target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak </a> &nbsp; &nbsp;
							<?php
						}
						if($this->session->userdata('akses_level') == 2 && $header_transaksi->status_bayar == false) {
							?>
								<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status </a>
							<?php
						}
						if($this->session->userdata('akses_level') == 1) {
							?>
								<a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status </a>
							<?php
						}
					}
				?>	
			</div>
		</td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>
