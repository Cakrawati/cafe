<p>
	<a href="<?php echo base_url('admin/pegawai/tambah') ?>" class="btn btn-success btn-lg" >
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
			<th>NAMA PEGAWAI</th>
			<th>JENIS KELAMIN</th>
			<th>ALAMAT</th>
			<th>TELEPON</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pegawai as $pegawai) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pegawai->nama?></td>
			<td><?php echo $pegawai->jenis_kelamin?></td>
			<td><?php echo $pegawai->alamat_pegawai?></td>
			<td><?php echo $pegawai->telepon_pegawai?></td>
			<td><?php echo $pegawai->status_pegawai ?></td>
			<td>
				<a href="<?php echo base_url('admin/pegawai/edit/' .$pegawai->id_pegawai) ?>" class="btn btn-warning btn_xs"><i class="fa fa-edit"></i> Edit </a>
				
				<a href="<?php echo base_url('admin/pegawai/delete/' .$pegawai->id_pegawai) ?>" class="btn btn-danger btn_xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>