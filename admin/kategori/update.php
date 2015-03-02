<h1>Ubah Kategori</h1>
<?php
	if($_GET['data']){
		$data=$_GET['data'];
		$query="SELECT * FROM tblkategori WHERE kategori='$data'";
		
		if ($result = $db->query($query)){
			if ($result->num_rows){
				$row=$result->fetch_object();
				$kategori=$row->kategori;
				$keterangan=$row->keterangan_kategori;
				$result->free();
			}
		}
	}

?>
	
<form class="form" method="post" action="">
	<label><i>Kategori</i></label><br/>
	<input type="text" name="kategori" value="<?php echo $kategori;?>"/><br/>
	<label><i>Keterangan</i></label><br/>
	<input type="text" name="keterangan" value="<?php echo $keterangan?>"/><br/><br/>
	<input type="submit" name="simpan" value="Simpan"/>
</form>
<?php
	if (!empty($_POST)){
		if (isset($_POST['kategori'],$_POST['keterangan'])){
			$kategori=$_POST['kategori'];
			$keterangan=$_POST['keterangan'];
			
			$query = "UPDATE tblkategori SET kategori='$kategori',
						keterangan_kategori='$keterangan'
						WHERE kategori='$data'";
			$db->query($query);
			header('location:?menu=1&mode=1&page=1&data=1');
		}
	}
?>

