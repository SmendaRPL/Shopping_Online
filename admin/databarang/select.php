<h1>Data Barang</h1>
<a href="?menu=2&mode=2&page=1&data=1">Masukkan Data Barang</a><br/>

<?php

	$query = "SELECT * FROM tblbarang";
	$result = $db->query($query);
	$jumlahdata = $result->num_rows;
	
	echo "<br/>";
	
	$data = 3;
	$jumlahhalaman = ceil($jumlahdata/$data);
	
	if (isset($_GET['page'])){
		$page = $_GET['page'];
		$mulai = ($_GET['page']-1)*$data;
	}else{
		$page=0;
		$mulai=0;
	}
	if ($page>1){
		echo "<a href='?menu=2&mode=1&page=";
		echo $page-1;
		echo "&data=1'>";
		echo "Prev";
		echo "</a>";
		echo "&nbsp &nbsp";
	}
	
	for ($a=1; $a<=$jumlahhalaman; $a++){
		echo "<a href='?menu=2&mode=1&page=$a&data=1'>$a</a>";
		echo "&nbsp &nbsp";
	}
	
	if ($page<$jumlahhalaman){
		echo "<a href='?menu=2&mode=1&page=";
		echo $page+1;
		echo "&data=1'>";
		echo "Next";
		echo "</a>";
	}
	
	$record = array();
	if ($result=$db->query("SELECT * FROM tblkategori")){
		if ($result->num_rows){
			while ($row = $result->fetch_object()){
				$record[]=$row;
			}
			$result->free();
		}
	}
	
	$query = "SELECT * FROM tblbarang LEFT JOIN tblkategori
				ON tblbarang.kategori = tblkategori.kategori LIMIT $mulai , $data";
				
	$barang = array ();
	if ($result=$db->query($query)){
		if ($result->num_rows){
			while ($row = $result->fetch_object()){
				$barang[]=$row;
			}
			
			$result->free();
			
		}
	}
	if (isset($_POST['select'])){
		$select = $_POST['select'];
		
		$query  =  "SELECT * FROM tblbarang LEFT JOIN tblkategori 
					ON tblbarang.kategori = tblkategori.kategori
					WHERE tblbarang.kategori = '$select'";
		
		$barang = array();
		if ($result=$db->query($query)){
			if ($result->num_rows){
				while ($row = $result->fetch_object()){
					$barang[]=$row;
				}
				$result->free();
			}
		}
	}
	
?>
<form class="form" method="POST">
	<select name="select">
		<?php
			foreach ($record as $r){
				echo "<option value='$r->kategori'>$r->kategori</option>";
			}
		?>
	</select>
	<input type="submit" name="btncari" value="Cari"/>
</form>

<table>
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Nama Barang</th>
		<th>Deskripsi</th>
		<th>Kategori</th>
		<th>Jumlah</th>
		<th>Harga</th>
		<th>Foto</th>
		<th>Ubah</th>
		<th>Hapus</th>
	</tr>
	<?php
		$n= $mulai + 1;
			foreach ($barang as $b){
	?>
	<tr>
		<td><?php echo $n++;?></td>
		<td><?php echo $b->id_barang;?></td>
		<td><?php echo $b->nama_barang;?></td>
		<td><?php echo $b->deskripsi;?></td>
		<td><?php echo $b->kategori;?></td>
		<td><?php echo $b->jumlah;?></td>
		<td><?php echo $b->harga;?></td>
		<td><?php echo "<img src='images/$b->foto'>";?></td>
		<td><a href="?menu=2&mode=3&page=1&data=<?php echo $b->id_barang;?>">Ubah 1</a></td>
		<td><a href="?menu=2&mode=4&page=1&data=<?php echo $b->id_barang;?>">Hapus 1</a></td>
	</tr>
    <?php
        }
    ?>
</table>