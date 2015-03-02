<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
	<?php require_once('../koneksi/koneksi.php')?>
		<div class="wrapper">
			<div class="box-1">
				<ul>
					<li>Barang</li>
						<ul>
							<li> <a href="?menu=1&mode=1&page=1&data=1">Kategori</a></li>
							<li> <a href="?menu=2&mode=1&page=1&data=1">Data Barang</a></li>
						</ul>
					<li>Transaksi</li>
						<ul>
							<li> <a href="?menu=3&mode=1&page=1&data=1">Pembelian</a></li>
							<li> <a href="?menu=4&mode=1&page=1&data=1">Pembayaran</a></li>
							<li> <a href="?menu=5&mode=1&page=1&data=1">Pelanggan</a></li>
						</ul>
					<li>Laporan</li>
						<ul>
							<li> <a href="?menu=6&mode=1&page=1&data=1">Laporan Pembayaran</a></li>
							<li> <a href="?menu=7&mode=1&page=1&data=1">Laporan Pengiriman</a></li>
						</ul>
					<li>Utilitas</li>
						<ul>
							<li> <a href="?menu=8&mode=1&page=1&data=1">Identitas</a></li>
							<li> <a href="?menu=9&mode=1&page=1&data=1">User</a></li>
						</ul>
				</ul>
			</div>
			<div class="admin">
				<h1>Admin Page</h1>
			</div>
			<div class="box-2">
				<?php
					if (isset($_GET['menu'],$_GET['mode'],$_GET['page'],$_GET['data'])){
						$menu = $_GET['menu'];
						$mode = $_GET['mode'];
						$page = $_GET['page'];
						$data = $_GET['data'];
						
						if ($menu == 1 and $mode == 1 and $page and $data == 1){
							require_once("kategori/select.php");
						}
						
						if ($menu == 1 and $mode == 2 and $page and $data == 1){
							require_once("kategori/insert.php");
						}
						
						if ($menu == 1 and $mode == 3 and $page and $data){
							require_once("kategori/update.php");
						}
						
						if ($menu == 1 and $mode == 4 and $page and $data){
							require_once("kategori/delete.php");
						}
						
						if ($menu == 2 and $mode == 1 and ($page == 1 or $page)  and $data == 1){
							require_once("databarang/select.php");
						}
						
						if ($menu == 2 and $mode == 2 and $page == 1 and $data == 1){
							require_once("databarang/insert.php");
						}
						
						if ($menu == 2 and $mode == 3 and $page == 1 and $data){
							require_once("databarang/update.php");
						}
						
						if ($menu == 2 and $mode == 4 and $page and $data){
							require_once("databarang/delete.php");
						}
						
						if ($menu == 3 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pembelian/select.php");
						}
						
						if ($menu == 3 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pembelian/insert.php");
						}
						
						if ($menu == 3 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pembelian/update.php");
						}
						
						if ($menu == 3 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pembelian/delete.php");
						}
						
						if ($menu == 4 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pembayaran/select.php");
						}
						
						if ($menu == 4 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pembayaran/insert.php");
						}
						
						if ($menu == 4 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pembayaran/update.php");
						}
						
						if ($menu == 4 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pembayaran/delete.php");
						}
						
						if ($menu == 5 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pelanggan/select.php");
						}
						
						if ($menu == 5 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pelanggan/insert.php");
						}
						
						if ($menu == 5 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pelanggan/insert.php");
						}
						
						if ($menu == 5 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pelanggan/insert.php");
						}
						
						if ($menu == 6 and $mode == 1 and $page == 1 and $data == 1){
							require_once("laporanpembayaran/select.php");
						}
						
						if ($menu == 6 and $mode == 2 and $page == 1 and $data == 1){
							require_once("laporanpembayaran/insert.php");
						}
						
						if ($menu == 6 and $mode == 3 and $page == 1 and $data == 1){
							require_once("laporanpembayaran/update.php");
						}
						
						if ($menu == 6 and $mode == 4 and $page == 1 and $data == 1){
							require_once("laporanpembayaran/delete.php");
						}
						
						if ($menu == 7 and $mode == 1 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/select.php");
						}
						
						if ($menu == 7 and $mode == 2 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/insert.php");
						}
						
						if ($menu == 7 and $mode == 3 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/update.php");
						}
						
						if ($menu == 7 and $mode == 4 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/delete.php");
						}
						
						if ($menu == 8 and $mode == 1 and $page == 1 and $data == 1){
							require_once("identitas/select.php");
						}
						
						if ($menu == 8 and $mode == 2 and $page == 1 and $data == 1){
							require_once("identitas/insert.php");
						}
						
						if ($menu == 8 and $mode == 3 and $page == 1 and $data == 1){
							require_once("identitas/update.php");
						}
						
						if ($menu == 8 and $mode == 4 and $page == 1 and $data == 1){
							require_once("identitas/delete.php");
						}
						
						if ($menu == 9 and $mode == 1 and $page == 1 and $data == 1){
							require_once("user/select.php");
						}
						
						if ($menu == 9 and $mode == 2 and $page == 1 and $data == 1){
							require_once("user/insert.php");
						}
						
						if ($menu == 9 and $mode == 3 and $page == 1 and $data == 1){
							require_once("user/update.php");
						}
						
						if ($menu == 9 and $mode == 4 and $page == 1 and $data == 1){
							require_once("user/delete.php");
						}
					}
				?>
			</div>
		</div>
	</body>
</html>