<?php

// Error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/merchandise/gambar/'.$merchandise->id_merchandise),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Judul Gambar</label>
    <div class="col-md-5">
      <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar Merchandise" value="<?php echo set_value('judul_gambar')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Unggah Gambar</label>
    <div class="col-md-5">
      <input type="file" name="gambar" class="form-control" placeholder="Gambar Merchandise" value="<?php echo set_value('gambar')?>" required>
    </div>
    <div class="col-md-5">
    	<button class="btn btn-success btn-sm" name="submit" type="submit">
      	<i class="fa fa-save"></i> Simpan dan Unggah Gambar
      </button>
      <button class="btn btn-info btn-sm" name="reset" type="reset">
      	<i class="fa fa-times"></i> Reset
      </button>
    </div>
</div>

<?php echo form_close(); ?>

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
			<th>JUDUL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?php echo $no=1; ?>
			</td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$merchandise->gambar) ?>" class="img img-responsive img-thumbnail" width="60" >
			</td>
			<td><?php echo $merchandise->nama_merchandise ?></td>
			<td>

			</td>
		</tr>
		<?php $no=2; foreach ($gambar as $gambar) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="60" >
			</td>
			<td><?php echo $gambar->judul_gambar ?></td>
			<td>

				<a href="<?php echo base_url('admin/merchandise/delete_gambar/' .$merchandise->id_merchandise.'/'.$gambar->id_gambar) ?>" class="btn btn-warning btn_xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash"></i> Hapus </a>

			</td>
				
		</tr>
		<?php } ?>
	</tbody>
</table>