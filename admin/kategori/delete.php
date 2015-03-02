<h1>Hapus Kategori</h1>
<?php
	if (isset($_GET['data'])){
		$data=$_GET['data'];
		
		
		$query = "DELETE FROM tblkategori WHERE kategori='$data'";
		$result = $db->query($query);
		
		header('location:?menu=1&mode=1&page=1&data=1');
	}
?>