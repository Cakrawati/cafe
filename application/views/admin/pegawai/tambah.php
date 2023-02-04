<?php
// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/pegawai/tambah'),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Pegawai</label>
    <div class="col-md-5">
      <select name="id_user" class="form-control" required>
        <option value="">-- Pilih Pengguna --</option>
        <?php 
          foreach($users as $key => $value) {
            ?> <option value="<?php echo $value->id_user?>"> <?php echo $value->nama ?></option><?php
          }
        ?>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-md-5">
      <select name="jenis_kelamin" class="form-control">
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Alamat Pegawai</label>
    <div class="col-md-5">
      <input type="text" name="alamat_pegawai" class="form-control" placeholder="Alamat Pegawai" value="<?php echo set_value('alamat_pegawai')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Telepon Pegawai</label>
    <div class="col-md-5">
      <input type="text" name="telepon_pegawai" class="form-control" placeholder="Telepon Pegawai" value="<?php echo set_value('telepon_pegawai')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status Pegawai</label>
    <div class="col-md-5">
      <select name="status_pegawai" class="form-control">
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
    <div class="col-md-5">
      <input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk Pegawai" value="<?php echo set_value('tanggal_masuk')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
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