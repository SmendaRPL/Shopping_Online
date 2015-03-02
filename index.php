<?php require 'cart.php' ;?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Welcome to My Shop</title>
		<meta charset="utf-8" />
		
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<section class="wrapper">
			<header>
				<div class="judul-web">MACBETH FOOTWEAR</div>
			</header>
			<section class="maincontent">
				<section class="life-side-bar">
					<img src="images/3.png">
				</section>
				<section class="main-slider">
					<section class="slider">
						<img src="images/1.jpg">
					</section>
					<section class="main-side">
                        <div class="box-1">
				            <?php
                                products();
                            ?>
						</div>
					</section>
				</section>
				<section class="right-side-bar">
				    <section>
						<img src="images/4.png">
					</section>
					<section class="keranjang">
                        <h1 class="judul-keranjang">Daftar Keranjang Belanja</h1>
						<?php
							echo '<div class="datakeranjang">';
							echo cart();
							echo '</div>'
                        ?>
                    </section>
				</section>
			</section>
			<footer class="footer">
				<br/>
				<h1>copyright2015&copyRaditya_bagus</h1>
			</footer>
		</section>	
	</body>
</html>