<?php
// Loading konfigurasi website
$site  = $this->konfigurasi_model->listing();
?>

<!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
                    <a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-whatsapp"> <?php echo $site->telepon ?></a>
                </div>

                <span class="topbar-child1">
                    <?php echo $site->alamat ?>
                </span>

                <div class="topbar-child2">
                    <span class="topbar-email">
                        <?php echo $site->email ?>
                    </span>

                </div>
            </div>



