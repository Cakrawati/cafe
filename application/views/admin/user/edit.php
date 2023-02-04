<?php
// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/edit/' .$user->id_user),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Pengguna</label>
    <div class="col-md-5">
      <input type="text" name="nama" class="form-control" placeholder="Nama pengguna" value="<?php echo $user->nama ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-md-5">
      <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-md-5">
      <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Level Hak Akses</label>
    <div class="col-md-5">
      <select name="akses_level" class="form-control" required>
        <option value="">-- Pilih Role --</option>
        <?php 
          foreach($akses_level as $key => $value) {
            ?>
              <option value="<?php echo $value->level_id?>" <?php if ($value->level_id == $user->akses_level) echo 'selected' ?> > 
                <?php echo $value->nama ?>
              </option>
            <?php
          }
        ?>
      </select>
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
