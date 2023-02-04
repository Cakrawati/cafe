<?php
// Ambil data menu dari konfigurasi
$nav_produk         = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile  = $this->konfigurasi_model->nav_produk();
?>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="#" class="logo">
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <!-- HOME -->
                         <li>
                            <a href="<?php echo base_url() ?>">Home</a>
                        </li>

                        <!-- MENU PRODUK -->
                        <li>
                            <a href="<?php echo base_url('produk') ?>">Produk</a>
                            <ul class="sub_menu">
                                <?php foreach($nav_produk as $nav_produk) { ?>
                                <li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
                                    <?php echo $nav_produk->nama_kategori  ?>
                                </a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('about') ?>">Our Story</a>
                        </li>

                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <!-- disini ya bro yang regis dan login -->

                <span class="linedivide1"></span>

                <!-- <div class="header-wrapicon2"> -->
                    <!-- <?php
                    //check data belanjaan ada atau tidak
                    $keranjang = $this->cart-> contents();
                    ?> -->
                    <!-- <img src="<?php site_url('belanja/checkout') ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"><?php echo count($keranjang) ?></span> -->
                     <!-- <a href="<?=site_url('belanja/checkout');?>" title="Tampilkan Cart Order Anda">
                        <i class="fa fa-cart-plus"></i>
                        <span>Cart Order Anda</span>
                    </a> -->

                    

                <div class="header-wrapicon2">
                    <?php
                    //check data belanjaan ada atau tidak
                    $keranjang = $this->cart-> contents();
                    ?>
                    <img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"><?php echo count($keranjang) ?></span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php
                            //kalau ga ada data belanjaan
                            if(empty($keranjang)) {
                            ?>
                            <li class="header-cart-item">
                                <p class="alert alert-success">Keranjang Belanja Kosong</p>
                            </li>

                            <?php
                            //Kalau ada data belanjaan
                            }else{
                            // Total belanja
                                $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                            // Tampilan data belanjaan
                                foreach ($keranjang as $keranjang) {
                                    $id_produk  = $keranjang['id'];
                                    // Ambil data produk
                                    $produknya  = $this->produk_model->detail($id_produk);
                            ?>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
                                        <?php echo $keranjang['name'] ?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?> = Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.') ?>
                                    </span>
                                </div>
                            </li>
                            <?php 
                            } // Tutup foreach keranjang
                            } // tutup if
                            ?>

                        </ul>

                        <div class="header-cart-total">
                            Total : <?php if( ! empty($keranjang)) echo $total_belanja ?>
                        </div>

                        <div class="header-cart-buttons">
                            <!-- <div class="header-cart-wrapbtn">
                                
                                <a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div> -->

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <a href="#" class="logo-mobile">
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
        </a>

        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <?php
                    //check data belanjaan ada atau tidak
                    $keranjang_mobile = $this->cart-> contents();
                    ?>
                    <img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"><?php echo count($keranjang_mobile) ?></span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">

                            <?php
                            //kalau ga ada data belanjaan
                            if(empty($keranjang_mobile)) {
                            ?>
                            <li class="header-cart-item">
                                <p class="alert alert-success">Keranjang Belanja Kosong</p>
                            </li>

                            <?php
                            //Kalau ada data belanjaan
                            }else{
                            // Total belanja
                                $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                            // Tampilan data belanjaan
                                foreach ($keranjang_mobile as $keranjang_mobile) {
                                    $id_produk_mobile  = $keranjang_mobile['id'];
                                    // Ambil data produk
                                    $produk_mobile  = $this->produk_model->detail($id_produk_mobile);
                            ?>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk_mobile->gambar) ?>" alt="<?php echo $keranjang_mobile['name'] ?>">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url('produk/detail/'.$produk_mobile->slug_produk) ?>" class="header-cart-item-name">
                                        <?php echo $keranjang_mobile['name'] ?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo $keranjang_mobile['qty'] ?> x Rp. <?php echo number_format($keranjang_mobile['price'],'0',',','.') ?>: Rp. <?php echo number_format($keranjang_mobile['subtotal'],'0',',','.') ?>
                                    </span>
                                </div>
                            </li>
                            <?php 
                            } // Tutup foreach keranjang
                            } // tutup if
                            ?>

                        </ul>

                        <div class="header-cart-total">
                            Total: <?php if( ! empty($keranjang)) echo $total_belanja ?>
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <span class="topbar-child1">
                        <?php echo $site->alamat ?>
                    </span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <span class="topbar-email">
                            <?php echo $site->email ?>
                        </span>

                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
                        <a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-whatsapp"> <?php echo $site->telepon ?></a>
                    </div>
                </li>

                <!-- HOME MOBILE -->
                <li class="item-menu-mobile">
                    <a href="<?php echo base_url() ?>">Home</a>
                </li>

                <!-- MENU PRODUK MOBILE -->
                <li class="item-menu-mobile">
                    <a href="<?php echo base_url('produk') ?>">Drink &amp; Snack</a>
                    <ul class="sub_menu">
                        <?php foreach($nav_produk_mobile as $nav_produk_mobile) { ?>
                        <li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
                            <?php echo $nav_produk_mobile->nama_kategori  ?>
                        </a></li>
                        <?php } ?>
                    </ul>
                </li>
                
                <li class="item-menu-mobile">
                    <a href="<?php echo base_url('merchandise') ?>">Merchandise</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">Our Story</a>
                </li>

            </ul>
        </nav>
    </div>
</header>

