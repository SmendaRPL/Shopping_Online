<h1>Ubah Data Barang</h1>
<?php
    if (isset($_GET['data'])){
        $data = $_GET['data'];
        
        $query = "SELECT * FROM tblbarang WHERE id_barang='$data'";
        $result = $db->query($query);
        $row = $result->fetch_object();
    }

    $record = array();
    if ($results=$db->query("SELECT * FROM tblkategori")){
        if ($results->num_rows){
            while ($rows=$results->fetch_object()){
                $record[]=$rows;
            }
            $results->free();
        }
    }

?>
<form class="form" method="post" action="" enctype="multipart/form-data">
    <label>Pilih Kategori</label><br/>
        <select name="kategori">
           <?php
               foreach ($record as $r){
                    if ($r->kategori == $row->kategori){
                        echo "<option value='$r->kategori' selected>$r->kategori</option>";
                    }else{
                        echo "<option value='$r->kategori'>$r->kategori</option>";
                    }
               }
            ?>
        </select><br/>
    <label>ID Barang</label><br/>
        <input type="text" name="id" value="<?php echo $row->id_barang;?>"/><br/>
    <label>Nama Barang</label><br/>
        <input type="text" name="barang" value="<?php echo $row->nama_barang;?>"/><br/>
    <label>Harga Barang</label><br/>
        <input type="text" name="harga" value="<?php echo $row->harga;?>"/><br/>
    <label>Jumlah Barang</label><br/>
        <input type="text" name="jumlah" value="<?php echo $row->jumlah;?>"/><br/>
    <label>Deskripsi</label><br/>
        <textarea name="deskripsi"><?php echo $row->deskripsi;?></textarea><br/>
    <input type="file" name="file">
    <input type="submit" value="upload"><br/><br/>
    <?php $file_name = $row->foto ;echo $file_name;?>
    
    <input type="submit" name="btnsimpan" value="Simpan"></input>
    
</form>
<?php
        if (isset($_FILES['file'])){
            $file = $_FILES['file'];
            
            $file_name = $file['name'];
            $file_tmp  = $file['tmp_name'];
            $file_size = $file['size'];
            $file_destination = 'images/' . $file_name; 
            
            if (move_uploaded_file($file_tmp, $file_destination)){
                echo $file_destination;
            }
        }
?>
<?php
    if (!empty ($_POST)){
        if (isset($_POST['kategori'], $_POST['id'], $_POST['barang'], $_POST['harga'], $_POST['jumlah'], $_POST['deskripsi'])){
            $kategori = $_POST['kategori'];
            $id = $_POST['id'];
            $barang = $_POST['barang'];
            $harga = $_POST['harga'];
            $jumlah = $_POST['jumlah'];
            $deskripsi = $_POST['deskripsi'];
            
            $query = "UPDATE tblbarang SET kategori='$kategori', id_barang='$id', nama_barang='$barang', harga='$harga',                           jumlah='$jumlah', deskripsi='$deskripsi', foto='$file_name' WHERE id_barang='$data'";
            
            $db->query($query);
            header('location:?menu=2&mode=1&page=1&data=1');
        }
    }
?>