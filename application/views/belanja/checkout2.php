<section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
            <h1><?php echo $title ?></h1><hr>
            <div class="clearfix"></div>
            <br><br>

            <?php if($this->session->flashdata('sukses')){
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            } ?>
            
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <?php 
                        echo form_open(base_url('belanja/checkout')); 
                        $kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
                        ?>
                        <!-- <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>"> -->
                        <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
                        <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
                        
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th width="25%">Kode Transaksi</th>
                                        <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
                                    </tr>
                                    <tr>
                                        <th width="25%">Nama Penerima*</th>
                                        <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?php echo set_value('nama_pelanggan')?>" required></th>
                                    </tr>
                                    <tr>
                                        <th width="25%">Telepon*</th>
                                        <th><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></th>
                                    </tr>
                                    <tr>
                                        <th width="25%">Email</th>
                                        <th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>"></th>
                                    </tr>
                                    <tr>
                                        <th width="25%">No. Meja</th>
                                        <th>
                                            <select name="id_meja" class="form-control">
                                                <?php foreach ($meja as $meja) { ?>
                                                <option value="<?php echo $meja->id_meja ?>" <?php if ($header_transaksi->id_meja==$meja->id_meja) { echo "selected";   } ?>>
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
                                            <button class="btn btn-success btn-lg" type="submit">
                                                <i class="fa fa-save"></i> Check Out
                                            </button>
                                            <button class="btn btn-default btn-lg" type="reset">
                                                <i class="fa fa-times"></i> Reset
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><small>Form yang bertanda (*) wajib diisi!</small></td>
                                    </tr>
                                </tbody>
                            </table>

                        <?php echo form_close(); ?>
                    </div>
                </div>

                    <!-- Product -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <table class="table-shopping-cart">
                                <tr class="table-head">
                                    <th class="column-1">GAMBAR</th>
                                    <th class="column-2">PRODUCT</th>
                                    <th class="column-3" width="10%">HARGA</th>
                                    <th class="column-4 p-l-40">JUMLAH</th>
                                    <th class="column-5" width="15%">SUB TOTAL</th>
                                    <th class="column-6" width="20%">ACTION</th>
                                </tr>
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
                                    <td class="column-3" width="10%">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5" width="15%">Rp.
                                        <?php 
                                        $sub_total = $keranjang['price'] * $keranjang['qty'];
                                        echo number_format($sub_total,'0',',','.'); 
                                        ?>
                                    </td>
                                    <td>
                                        <button type="submit" name="update" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i> Update
                                        </button>

                                        <a href=" 'belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
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
                                    <td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
                                </tr>
                            </table>
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
