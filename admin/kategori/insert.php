<section class="form">
<h1>Masukkan Kategori</h1>

	<form method="post" action="">
		<label><i>Kategori</i></label><br/>
		<input type="text" name="kategori"/><br/>
		<label><i>Keterangan</i></label><br/>
		<input name="keterangan"/><br/><br/>
		<input type="submit" name="simpan" value="Simpan"/>
	</form>
</section>
<?php
	if (!empty($_POST)){
		if (isset($_POST['simpan'], $_POST['kategori'], $_POST['keterangan'])){
	
			$kategori=$_POST['kategori'];
			$keterangan=$_POST['keterangan'];
			
			if(!empty($kategori) && !empty($keterangan)){
				$insert=$db->prepare("INSERT INTO tblkategori(kategori,keterangan_kategori) VALUES (?,?) ");
				$insert->bind_param('ss' , $kategori, $keterangan);
				
				if ($insert->execute()){
					header('location:?menu=1&mode=1&page=1&data=1');
					die();
				}
			}
		}
	}

?>