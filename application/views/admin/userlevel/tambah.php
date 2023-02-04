<?php
// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/userlevel/tambah'),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">ID Level Akses</label>
    <div class="col-md-5">
      <input type="text" name="level_id" class="form-control" placeholder="ID Level Akses" value="<?php echo set_value('level_id')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Level Akses</label>
    <div class="col-md-5">
      <input type="text" name="nama" class="form-control" placeholder="Nama Level Akses" value="<?php echo set_value('nama')?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-md-5">
      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Level Akses" value="<?php echo set_value('keterangan')?>" required>
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