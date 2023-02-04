<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/template/images/kopi.jpg);">
<h2 class="l-text2 t-center">
	<?php echo $title ?>
</h2>
<p class="m-text13 t-center">
	<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<!-- <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
		</div> -->

		<div class="col-sm-12 col-md-8 col-lg-9 p-b-50">
			<!-- Product -->
			<div class="row">
				<?php foreach($merchandise as $merchandise) { ?>
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
					<?php 
					// form untuk memproses belanjaan 
					echo form_open(base_url('belanja/add')); 
					// Elemen yang dibawa
					echo form_hidden('id', $merchandise->id_merchandise);
					echo form_hidden('qty', 1);
					echo form_hidden('price', $merchandise->harga);
					echo form_hidden('name', $merchandise->nama_merchandise);
					// Elemen redirect
					echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
					?>
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$merchandise->gambar) ?>" alt="<?php echo $merchandise->nama_merchandise ?>">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="fa fa-eye" aria-hidden="true"></i>
									<i class="fa fa-eye dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
				                        Add to Cart
				                    </button>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="<?php echo base_url('merchandise/detail/'.$merchandise->slug_merchandise) ?>" class="block2-name dis-block s-text3 p-b-5">
				                <?php echo $merchandise->nama_merchandise ?>
				            </a>

							<span class="block2-price m-text6 p-r-5">
								IDR. <?php echo number_format($merchandise->harga,'0',',','.') ?>
							</span>
						</div>
					</div>
					<?php
					// Closing form
					echo form_close();
					?>
				</div>
				<?php } ?>
			</div>

			<!-- Pagination -->
			<div class="pagination flex-m flex-w p-t-26 text-center">
				<?php echo $pagin; ?>
			</div>
		</div>
	</div>
</div>
</section>