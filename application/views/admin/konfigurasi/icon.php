<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo "</div>";
}
?>

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
echo form_open_multipart(base_url('admin/konfigurasi/icon'),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Nama Website</label>
    <div class="col-md-5">
      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Upload Ikon Baru</label>
    <div class="col-md-5">
      <input type="file" name="icon" class="form-control" placeholder="Upload Icon Baru" value="<?php echo $konfigurasi->icon ?>" required>
    Icon Lama: <br>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="200">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-md-5">
      <button class="btn btn-success btn-lg" name="submit" type="submit">
        <i class="fa fa-save"></i> Simpan
      </button>
      <button class="btn btn-info btn-lg" name="reset" type="reset">
        <i class="fa fa-times"></i> Reset
      </button>
    </div>
</div>

<?php echo form_close(); ?>