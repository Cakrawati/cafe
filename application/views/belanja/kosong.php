<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/template/images/kopi.jpg);">
<h2 class="l-text2 t-center">
    <?php echo $title ?>
</h2>
</section>

<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class="bgwhite">

    <!-- <h1><?php echo $title ?></h1><hr>
    <div class="clearfix"></div>
    <br><br> -->

    <?php if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    } ?>

    <p class="alert alert-success">Keranjang Belanja Kosong</p>


</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
    
</div>

<div class="size10 trans-0-4 m-t-10 m-b-10">
    <!-- Button -->
    
</div>
</div>


</div>
</section>
