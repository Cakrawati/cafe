<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dasbor') ?>" class="brand-link">
      <img src="<?php echo base_url() ?>assets/admin/dist/img/icon.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DANGAU KOPI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
 -->
      
      <!-- Sidebar Menu User -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- Menu Dashoard -->
          <li class="nav-item">
                <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">
                  <i class="nav-icon fa fa-home text-info"></i>
                  <p>DASHBOARD</p>
                </a>
          </li>

          <!-- Menu Produk -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                PRODUK
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk') ?>" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p> Data Produk </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk/tambah') ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p> Tambah Produk </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kategori') ?>" class="nav-link">
                  <i class="fa fa-tags nav-icon"></i>
                  <p> Kategori Produk </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu Produk -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                MERCHANDISE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/merchandise') ?>" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p> Data Merchandise </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/merchandise/tambah') ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p> Tambah Merchandise </p>
                </a>
              </li>
            </ul>
          </li>

           <!-- Menu Dashoard -->
          <li class="nav-item">
                <a href="<?php echo base_url('admin/rekening') ?>" class="nav-link">
                  <i class="nav-icon fa fa-dollar-sign text-info"></i>
                  <p>DATA REKENING</p>
                </a>
          </li>

          <!-- Menu Pengguna -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                PENGGUNA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
                  <i class="fa fa-table nav-icon"></i>
                  <p> Data Pengguna </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user/tambah') ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p> Tambah Pengguna </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu konigurasi -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                KONFIGURASI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p> Konfigurasi Umum </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
                  <i class="fa fa-image nav-icon"></i>
                  <p> Konfigurasi Logo </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p> Konfigurasi Icon </p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">              <!-- /.card-header -->
              <div class="card-body">