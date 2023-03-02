<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 2cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 2cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body onload="print()">
	<div class="cetak">
		<h1>BUKTI PEMBAYARAN TRANSAKSI <?php echo $site->namaweb ?></h1>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th width="20%">NAMA PELANGGAN</th>
				<th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
			</tr>
			<tr>
				<th width="20%">KODE TRANSAKSI</th>
				<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tanggal</td>
				<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			</tr>
			<?php
				if($header_transaksi->nama_kasir !== null) {	
					?>
						<tr>
							<td>Nama Kasir</td>
							<td>: <?php echo $header_transaksi->nama_kasir ?></td>
						</tr>
					<?php
				}
			?>
			<tr>
				<td>Jumlah total</td>
				<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			</tr>
			<tr>
				<td>Status Bayar</td>
				<td>: <?php 
					if($header_transaksi->status_bayar == true) {
						echo "Sudah Bayar";
					}else{
						echo "Belum Bayar";
					}
				?></td>
				
			</tr>
			<tr>
				<td>Tanggal Bayar</td>
				<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar)) ?></td>
			</tr>
			<tr>
				<td>Jumlah Bayar</td>
				<td>: Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>
			</tr>
			<tr>
				<td>Jumlah Diskon</td>
				<td>: Rp. <?php echo number_format($header_transaksi->diskon,'0',',','.') ?></td>
			</tr>
			<tr>
				<td>Jumlah Kembali</td>
				<td>: Rp. <?php echo number_format($header_transaksi->kembali,'0',',','.') ?></td>
			</tr>
		</tbody>
		</table>
		<br>
		<table class="table table-bordered" width="100%">
		<thead>
			<tr class="bg-dark">
				<th>NO</th>
				<th>KODE</th>
				<th>NAMA PRODUK</th>
				<th>JUMLAH</th>
				<th>HARGA</th>
				<th>SUB TOTAL</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($transaksi as $transaksi) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $transaksi->kode_produk ?></td>
				<td><?php echo $transaksi->nama_produk ?></td>
				<td><?php echo number_format($transaksi->jumlah) ?></td>
				<td><?php echo number_format($transaksi->harga) ?></td>
				<td><?php echo number_format($transaksi->total_harga) ?></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
		</table>

	</div>
</body>
</html>