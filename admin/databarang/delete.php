<h1>Hapus Data Barang</h1>
<?php
	if (isset($_GET['data'])){
		$data=$_GET['data'];
		
		$query = "DELETE FROM tblbarang WHERE id_barang='$data'";
		$result = $db->query($query);
		
		header('location:?menu=2&mode=1&page=1&data=1');
	}
?>