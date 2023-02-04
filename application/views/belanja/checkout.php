<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/template/images/kopi.jpg);">
<h2 class="l-text2 t-center">
    <?php echo $title ?>
</h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">

    <?php if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    } ?>

    <table class="table-shopping-cart">
        <tr class="table-head">
            <th class="column-1">GAMBAR</th>
            <th class="column-2">PRODUCT</th>
            <th class="column-3" width="10%">HARGA</th>
            <th class="column-4 p-l-40">JUMLAH</th>
            <th class="column-5" width="15%">SUB TOTAL</th>
            <th class="column-6" width="20%">ACTION</th>
        </tr>
        <!-- <tr>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers=""> 
                
            </td>
        </tr> -->
        <?php 

        //looping data keranjang belanja
        foreach ($keranjang as $keranjang) {
            // ambil data produk
            $id_produk  = $keranjang['id'];
            $produk     = $this->produk_model->detail($id_produk);

            // form update keranjang
            echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
        ?>
        
        <tr class="table-row">
            <td class="column-1">
                <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                </div>
            </td>
            <td class="column-2"><?php echo $keranjang['name'] ?></td>
            <td class="column-3" width="10%" id="price-<?php echo $id_produk ?>">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
            <td class="column-4">
                <div class="flex-w bo5 of-hidden w-size17">
                    <button onclick="buttonDown('<?php echo $id_produk ?>')" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" >
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                    </button>

                    <input onchange="changePrice('<?php echo $id_produk ?>')" onkeydown="onKeyPressPrice('<?php echo $id_produk ?>')"class="size8 m-text18 t-center num-product" id="qty-<?php echo $id_produk ?>" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                    <button onclick="buttonUp('<?php echo $id_produk ?>')" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </td>

            <!-- dalam penggunaan class itu bisa digunakan berkali dalam html nya
            kalau id dia hanya bisa sekali digunakan dalam html --> 
            <td class="column-5 subTotal" width="15%" id="subTotal-<?php echo $id_produk ?>">Rp.
                <?php 
                $sub_total = $keranjang['price'] * $keranjang['qty'];
                echo number_format($sub_total,'0',',','.'); 
                ?>
            </td>
            <td>
                <button type="submit" name="update" class="btn btn-success btn-sm">
                    <i class="fa fa-edit"></i> Update
                </button>

                <a href="<?php echo ('hapus/'.$keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>
        <?php
        // Echo form_close
        echo form_close();
        // End looping keranjang belanja 
        } 
        ?>
        <tr class="table-row bg-secondary text-strong" style="font-weight: bold; color: white; ">
            <td colspan="4" class="column-1">Total Belanja</td>
            <td colspan="2" class="column-2" id="sumAll">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
            <a href="<?php echo base_url('belanja/delete') ?>" class="btn btn-danger btn-lg">
                <i class="fa fa-trash-o"></i>
            </a>
        </tr>
    </table>
    <br>
    <?php 
    echo form_open(base_url('belanja/checkout')); 
    $kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
    ?>
    <!-- <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>"> -->
    <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
    <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
    
    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Detail Pemesanan
            </h5>
            <table class="table">
            <thead>
                <tr>
                    <th width="25%">Kode Transaksi</th>
                    <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
                </tr>
                <tr>
                    <th width="25%">Nama Penerima</th>
                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?php echo set_value('nama_pelanggan')?>" required></th>
                </tr>
               <!--  <tr>
                    <th width="25%">Telepon*</th>
                    <th><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></th>
                </tr>
                <tr>
                    <th width="25%">Email</th>
                    <th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>"></th>
                </tr> -->
                <tr>
                    <th width="25%">No. Meja</th>
                    <th>
                        <select name="nama_meja" class="form-control">
                            <?php foreach ($meja as $meja) { ?>
                            <option value="<?php echo $meja->nama_meja ?>" <?php { echo "selected";   } ?>>
                                <?php echo $meja->nama_meja ?> 
                            </option>
                            <?php } ?>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>Email Penerima</td>
                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
                </tr>
                <tr>
                    <td>Telepon Penerima*</td>
                    <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></td>
                </tr> -->
                <!-- <tr>
                    <td>Alamat Penerima</td>
                    <td><textarea name="alamat" class="form-control" placeholder="Alamatt"><?php echo set_value('alamat') ?></textarea></td>
                </tr> -->
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-dark btn-lg" type="submit">
                            <i class="fa fa-save"></i> Check Out
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>

    <?php echo form_close(); ?>
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

<script>
function changePrice(id) {
    if ($("#qty-"+id).val() < 0) {
        var qty = $("#qty-"+id).val(1);
        $("#subTotal-"+id).text($("#price-"+id).text())
    } else {
        var price = $("#price-"+id).text();
        price = price.split(" ");
        price = price[1].replace(".","");
        price = parseInt(price)*(parseInt($("#qty-"+id).val()));
        price = "Rp. " + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        $("#subTotal-"+id).text(price)
    }
    sumAll()
}

function onKeyPressPrice(id) {
    if(event.keyCode == 13) {
        $("#qty-"+id).val(parseInt($("#qty-"+id).val())+1)
        changePrice(id)
    }
    
}

function buttonDown(id) {
    if ($("#qty-"+id).val() > 1) {
        countingSubTotal("down", id)
    } else {
        $("#subTotal-"+id).text($("#price-"+id).text())
    }
    
    sumAll();
}

function buttonUp(id) {
    countingSubTotal("up", id)
    sumAll()
}

function countingSubTotal(stat,id) {
    var stats = (stat == "up") ? 1 : -1;
    var price = $("#price-"+id).text();
    // Rp. 20.000
    price = price.split(" ");
    // ["Rp.", "20.000"]
    price = price[1].replace(".","");
    // price[1] = 20.000
    // 20000 -> bentuk string
    price = parseInt(price)*(parseInt($("#qty-"+id).val())+stats);
    // 20000*(3+(-1)) = 20000*(2) = 40000 -> bentuk int
    // pengen dibentuk menjadi string lagi dengan tambahan Rp.
    price = "Rp. " + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    // pembalikan integer ke string dengan tambahan Rp.

    $("#subTotal-"+id).text(price)
}

function sumAll() {
    var coba = $('.subTotal').map(function() {
        return $(this).text();
    }).get().join(",");
    // Rp. 40.000,Rp. 80.000,Rp. 70.000
    coba = coba.split(",");
    // ["Rp. 40.000", "Rp. 80.000", "Rp. 70.000"]
    var sum = 0
    for(let i=0; i<coba.length; i++) {
        coba[i] = coba[i].replace("Rp.","").replace(/\s/g, "").replace(".","");
        // 40000
        sum += parseInt(coba[i]) // parseInt ubah string jadi int
        // sum = sum + parseInt(coba[i])
        // 0 + 40000
        // di iterasi kedua kan sum udah 40000
        // 40000 + 80000 = 120000
    }
    sum = "Rp. " + sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    // pembalikan interger ke string dengan tambahan "Rp."

    $("#sumAll").text(sum);
}

// data awal Rp.         20.000
// pertama dia dihapus Rp.
// kedua dia dihapus spasinya
// ketiga dia menghapus titik

// /\s/g => pencarian spasi
// Rp.         20.000 -> Rp.20.0000
// replace(/\s/g, "") tiap ketemu spasi bakal dihapus
// Rp.         20.000
// replace("Rp.", "") kalau ketemu Rp. dia bakal dihapus
//          20.000

// 20000 setelah diolah entah pengolahannya gimana anggap aja jadi 40000
// 1000000 => 1.000.000
</script>

