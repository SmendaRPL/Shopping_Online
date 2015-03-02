<?php
	$record = array();
	if ($result = $db->query("SELECT * FROM tblkategori")){
		if ($result->num_rows){
			while ($row = $result->fetch_object()){
				$record[]=$row;
			}
			$result->free();
		}
	}

?>
<section class="form">
	<h1>Masukkan Data Barang</h1>
	<form method="POST" action="" enctype="multipart/form-data">
		<label>Pilih Kategori</label><br/>
		<select name="kategori">
			<?php
				foreach ($record as $r){
					echo "<option value='$r->kategori'>$r->kategori</option>";
				}
			?>
		</select><br/>
		<label><i>Kode Barang</i></label><br/>
		<input type="text" name="id"/><br/>
		<label><i>Nama Barang</i></label><br/>
		<input type="text" name="barang"/><br/>
		<label><i>Harga Barang</i></label><br/>
		<input type="text" name="harga"/><br/>
		<label><i>Jumlah Barang</i></label><br/>
		<input type="text" name="jumlah"/><br>
		<label><i>Deskripsi Barang</i></label><br/>
		<textarea name="deskripsi">
	
		</textarea><br/><br/>
        <input type="file" name="file">
        <input type="submit" value="upload"><br/><br/>
		<input name="btnsimpan" type="submit" value="Submit">
		</input>
	</form>
    <?php
        if (isset($_FILES['file'])){
            $file = $_FILES['file'];
            
            // File Properties
            $file_name = $file['name'];
            $file_tmp  = $file['tmp_name'];
            $file_size = $file['size'];
            $file_destination = 'images/' . $file_name; 
            
            if (move_uploaded_file($file_tmp, $file_destination)){
                echo $file_destination;
            }
        }
    ?>
</section>
<?php
	if (isset($_POST['btnsimpan'])){
		$kategori = $_POST['kategori'];
		$id = $_POST['id'];
		$barang = $_POST['barang'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['jumlah'];
		$deskripsi = $_POST['deskripsi'];
		
		if (!empty($kategori) && !empty($id) && !empty($barang) && !empty($harga) && !empty($jumlah) && !empty($deskripsi)){
			$insert = $db->prepare("INSERT INTO tblbarang(kategori,id_barang,nama_barang,harga,jumlah,deskripsi,foto) VALUES (?,?,?,?,?,?,?) ");
			$insert->bind_param('sssiiss', $kategori,$id,$barang,$harga,$jumlah,$deskripsi,$file_name);
			
			if ($insert->execute()){
				header ('location:?menu=2&mode=1&page=1&data=1');
				die();
			}
		}
	}
?>

