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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Nama Website</label>
    <div class="col-md-5">
      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Tagline/Moto</label>
    <div class="col-md-5">
      <input type="text" name="tagline" class="form-control" placeholder="Tagline/Moto" value="<?php echo $konfigurasi->tagline ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Email</label>
    <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Website</label>
    <div class="col-md-5">
      <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Facebook</label>
    <div class="col-md-5">
      <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Instagram</label>
    <div class="col-md-5">
      <input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Telepon/HP</label>
    <div class="col-md-5">
      <input type="url" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Alamat Kantor</label>
    <div class="col-md-5">
      <input type="text" name="alamat" class="form-control" placeholder="Alamat Kantor" value="<?php echo $konfigurasi->alamat ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Deskripsi website</label>
    <div class="col-md-9">
      <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Website"><?php echo $konfigurasi->deskripsi ?></textarea>
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