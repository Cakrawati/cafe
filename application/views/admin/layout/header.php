  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Account -->
       <li class="dropdown user user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2.png" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <?php
                $aksesLevel = '';
                switch ($this->session->userdata('akses_level')) {
                    case '1':
                        $aksesLevel = "Admin";
                        break;
                    case '3':
                        $aksesLevel = "Barista";
                        break;
                    case '2':
                        $aksesLevel = "Kasir";
                        break;
                    default:
                        # code...
                        break;
                }
            ?>
          <li class="user-header">
            <img src="<?php echo base_url() ?>assets/admin/dist/img/user2.png" class="img-circle" alt="User Image">
            <p>
              <?php echo $this->session->userdata('nama'); ?> - <?php echo $aksesLevel; ?>
              <small><?php echo date('d M Y') ?></small>
            </p>
          </li>
          <!-- Menu footer -->
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo base_url('admin/profil') ?>" class="btn btn-default btn-flat">Profile</a>
              <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat" style="margin-left: 37%;">Sign Out</a>
            </div>

          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar