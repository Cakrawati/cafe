<p>
	<a href="<?php echo base_url('admin/merchandise/tambah') ?>" class="btn btn-success btn-lg" >
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo "</div>";
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA</th>
			<th>HARGA</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($merchandise as $merchandise) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$merchandise->gambar) ?>" class="img img-responsive img-thumbnail" width="60" >
			</td>
			<td><?php echo $merchandise->nama_merchandise ?></td>
			<td><?php echo number_format($merchandise->harga,'0',',','.') ?></td>
			<td><?php echo $merchandise->status_merchandise ?></td>
			<td>
				<a href="<?php echo base_url('admin/merchandise/gambar/' .$merchandise->id_merchandise) ?>" class="btn btn-success btn_xs"><i class="fa fa-image"></i> Gambar (<?php echo $merchandise->total_gambar ?>)</a>

				<a href="<?php echo base_url('admin/merchandise/edit/' .$merchandise->id_merchandise) ?>" class="btn btn-warning btn_xs"><i class="fa fa-edit"></i> Edit </a>
				
				
				<?php include('delete.php') ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>