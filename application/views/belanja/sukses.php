<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/font-awesome.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/style.css" media="all" />
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

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div id="post-9" class="post-9 page type-page status-publish hentry">
			<header class="entry-header">
				<h1 class="entry-title">Order Selesai</h1>
			</header>
			<div class="entry-content">
				<div class="woocommerce">
					<p class="woocommerce-thankyou-order-received text-center">Terima Kasih, Pesanan Anda Kami Terima.</p>
					<p class="woocommerce-thankyou-order-received text-center">Segera Lakukan Pembayaran Di Kasir Agar
						Pesanan Anda Dapat Kami Proses Dengan Cepat.</p>
					<ul class="woocommerce-thankyou-order-details order_details d-flex justify-content-center">
						<li class="date col-lg-3" style="padding: 1em 1.618em !important;border:1px solid #ddd">Order
							:#<strong><?=$header_transaksi->kode_transaksi;?></strong></li>
						<li class="date col-lg-3" style="border:1px solid #ddd">Tanggal :<strong><?=date("d-m-Y", strtotime($header_transaksi->tanggal_transaksi));?></strong></li>
						<li class="date col-lg-3" style="border:1px solid #ddd">Qty
							:<strong><?=$header_transaksi->total_item;?></strong></li>
						<li class="total col-lg-3" style="border:1px solid #ddd">Total :<strong><span class="woocommerce-Price-amount amount"><span
										class="woocommerce-Price-currencySymbol">Rp.
									</span><?=number_format($header_transaksi->jumlah_transaksi,0,'','.');?></span></strong>
						</li>
					</ul>
					<div class="clear"></div>
					<p>Silahkan melakukan Pembayaran setelah Anda menikmati hidangan Kami.</p>
					<h2>Order Detail</h2>
					<table class="shop_table order_details">
						<thead>
							<tr>
								<th class="product-name">Menu</th>
								<th class="product-total">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($transaksi as $r) { ?>
							<tr class="order_item">
								<td class="product-name">
									<a
										href="#"><?=ucwords(strtolower($r->nama_produk));?></a>
									<strong class="product-quantity"><?=$r->jumlah;?></strong>
								</td>
								<td class="product-total"><span class="woocommerce-Price-amount amount"><span
											class="woocommerce-Price-currencySymbol">Rp.
										</span><?=number_format($r->total_harga,0,'',',');?></span>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th scope="row">Total :</th>
								<td><span class="woocommerce-Price-amount amount"><span
											class="woocommerce-Price-currencySymbol">Rp.
										</span><?=number_format($header_transaksi->jumlah_transaksi,0,'',',');?></span></td>
							</tr>
						</tfoot>
					</table>
					<header>
						<h2>Detail Pembeli</h2>
					</header>
					<table class="shop_table customer_details">
						<tbody>
							<tr>
								<th>Nama :</th>
								<td><?=$header_transaksi->nama_pelanggan;?></td>
							</tr>
							<tr>
								<th>No. Meja :</th>
								<td><?=$header_transaksi->nama_meja;?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
</div>
</div>
</section>
