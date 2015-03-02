<?php
	require('../koneksi/koneksi.php');
?>
<h1>Kategori</h1>
<a href="?menu=1&mode=2&page=1&data=1">Masukkan Data Kategori</a><br/>

<?php
	
	$query = "SELECT * FROM tblkategori";
	$result = $db->query($query);
	$jumlahdata = $result->num_rows;
	
	echo "<br/>";
	
	$data = 3;
	$jumlahhalaman = ceil($jumlahdata/$data);
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$mulai = ($_GET['page']-1)*$data;
	} else {
		$page = 0;
		$mulai = 0;
	}
	if ($page > 1){
		echo "<a href='?menu=1&mode=1&page=";
		echo $page-1;
		echo "&data=1'>";
		echo "Prev";
		echo "</a>";
		echo "&nbsp &nbsp";
	}
	
	for ($a=1; $a<=$jumlahhalaman; $a++){
		echo "<a href='?menu=1&mode=1&page=$a&data=1'>$a</a>";
		echo "&nbsp &nbsp";
	}
	
	if ($page < $jumlahhalaman){
		echo "<a href='?menu=1&mode=1&page=";
		echo $page+1;
		echo "&data=1'>";
		echo "Next";
		echo "</a>";
	}
	echo "<br/>";
	
	$record = array();
	
		if ($result = $db->query("SELECT * FROM tblkategori LIMIT $mulai,$data")){
			if ($result->num_rows){
				while ($row=$result->fetch_object()){
					$record[]=$row;
				}
				$result->free();
			}
		}
?>
<table>
	<tr>
		<th>No</th>
		<th>Kategori</th>
		<th>Keterangan</th>
		<th>Ubah</th>
		<th>Hapus</th>
	</tr>
	<?php
		$nomor=$mulai+1;
		
		foreach($record as $r){
	?>
	<tr>
		<td><?php echo $nomor++; ?></td>
		<td><?php echo $r->kategori; ?></td>
		<td><?php echo $r->keterangan_kategori; ?></td>
		<td><a href="?menu=1&mode=3&page=1&data=<?php echo $r->kategori?>">Ubah 1</a></td>
		<td><a href="?menu=1&mode=4&page=1&data=<?php echo $r->kategori?>">Hapus 1</a></td>
	</tr>
	<?php
	}
	?>
	
</table>