<p>
	<a href="<?php echo base_url('admin/meja/tambah') ?>" class="btn btn-success btn-lg" >
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
			<th>NAMA</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($meja as $meja) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $meja->nama_meja?></td>
			<td>
				<a href="<?php echo base_url('admin/meja/edit/' .$meja->id_meja) ?>" class="btn btn-warning btn_xs"><i class="fa fa-edit"></i> Edit </a>
				
				<a href="<?php echo base_url('admin/meja/delete/' .$meja->id_meja) ?>" class="btn btn-danger btn_xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>