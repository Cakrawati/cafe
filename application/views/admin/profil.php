<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo "</div>";
}

if ($this->session->flashdata('error')) {
    echo '<p class="alert alert-danger">';
    echo $this->session->flashdata('error');
    echo "</div>";
}
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg"
                   alt="User profile picture">
            </div>

            <?php
                $aksesLevel = '';
                switch ($this->session->userdata('akses_level')) {
                    case '1':
                        $aksesLevel = "Admin";
                        break;
                    case '2':
                        $aksesLevel = "Barista";
                        break;
                    case '3':
                        $aksesLevel = "Kasir";
                        break;
                    default:
                        # code...
                        break;
                }
            ?>
            <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama'); ?></h3>

            <p class="text-muted text-center"><?php echo $this->session->userdata('nama'); ?> - <?php echo $aksesLevel; ?></p>
            <p class="text-muted text-center"><?php echo $pegawai->tanggal_masuk; ?></p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Data Diri</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ganti Password</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <?php
                // Notifikasi Error
                echo validation_errors('<div class="alert alert-warning">','</div>');

                // Form open
                echo form_open(base_url('admin/profil/update_profile/' .$pegawai->id_pegawai),' class="form-horizontal"');
                ?>  
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select name="jenis_kelamin" class="form-control">
                        <option value="Pria" <?php if($pegawai->jenis_kelamin=="Pria") { echo "selected"; } ?>>Pria</option>
                        <option value="Wanita" <?php if($pegawai->jenis_kelamin=="Wanita") { echo "selected"; } ?>>Wanita</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Alamat Pegawai</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat_pegawai" class="form-control" placeholder="Alamat Pegawai" value="<?php echo $pegawai->alamat_pegawai ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Telepon Pegawai</label>
                    <div class="col-sm-10">
                      <input type="text" name="telepon_pegawai" class="form-control" placeholder="Telepon Pegawai" value="<?php echo $pegawai->telepon_pegawai ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>
              <!-- tab pane -->

              <div class="tab-pane" id="timeline">
                <?php
                // Notifikasi Error
                echo validation_errors('<div class="alert alert-warning">','</div>');

                // Form open
                echo form_open(base_url('admin/profil/update_password/' .$pegawai->id_pegawai),' class="form-horizontal"');
                ?>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input type="password" name="old_password" class="form-control" placeholder="Password Lama" value="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" name="new_password" class="form-control" placeholder="Password Baru" value="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" name="conf_password" class="form-control" placeholder="Password Baru" value="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>