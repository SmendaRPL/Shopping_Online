<?php 
	include 'koneksi/koneksi.php';
	require 'cart.php';
?>
<!DOCTYPE_html>

<html>
	<head>
		<title>Daftar Belanja</title>
		<link rel="stylesheet" href="view.css">
	</head>
	<body>
		<section class="main-body">
			<header class="header">
				<div>DAFTAR BELANJA</div>
			</header>
			<section class="main-section">
				<div>
					<?php
						$total = 0;
						if (!empty ($_SESSION)){
							foreach ($_SESSION as $name => $value){
								if ($value>0){
									$id = substr($name,5,strlen($name)-5);
									$query = "SELECT * FROM tblbarang WHERE id_barang = '$id'";
									$result = $db->query($query);
									while ($row = $result->fetch_assoc()){
										$sub = $value * $row['harga'];
										$total = ($total+$sub);
											echo "<br/>"
												."<div class='data'>".$row['nama_barang']. ' X '. $value. '@'
												.number_format($row['harga'],0). ' = '.number_format($sub,0)
												.'<a href="?delete='.$id.'" class="link-delete"> DELETE</a>'."</div>"
												."<br/>
												</div><br/>";
									}
								}
							}
							if ($total == 0){
								echo "<br/><div class='kosong'>Anda belum berbelanja apapun</div><br/>";
							}else {
								echo "<hr/><br/><div class='total'>Total Belanja Anda = Rp ".number_format($total,0)."<br/>"."<br/>";	
							}
						}else {
							echo "<a>Silahkan belanja terlebih dahulu</a>";
						}
						
						if (isset($_GET['delete'])){
							$_SESSION['cart_'.(int)$_GET['delete']]='0';
						}
					?>
					<br/>
				</div>
			</section>
			<section class="kembali">
				<a href='index.php' class="back-index">Kembali ke Halaman Utama</a><br/>
			</section>
			<footer class="footer">
				<section>
					<marquee>Terimakasih atas kunjungan anda, selamat berbelanja kembali</marquee>
				</section>
			</footer>
		</section>
	</body>
</html>