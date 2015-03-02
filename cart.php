<?php
    session_start();
    
    
    
    require_once ('koneksi/koneksi.php');
    
    

    if (isset($_GET['beli'])){
        if (empty($_SESSION['cart_'.$_GET['beli']])){
            $_SESSION['cart_'.$_GET['beli']]=1;
        }else{
            $id = $_GET['beli'];
            $query = "SELECT * FROM tblbarang WHERE id_barang= '$id'";
            $result = $db->query($query);
            $row = $result ->fetch_assoc();
            if ($row['jumlah'] > $_SESSION['cart_'.$_GET['beli']]){
            $_SESSION['cart_'.$_GET['beli']]+=1;
            }
        }
        
    }

    if (isset($_GET['remove'])){
        $_SESSION['cart_'.$_GET['remove']]--;
    }

    if (isset($_GET['delete'])){
        $_SESSION['cart_'.$_GET['delete']]='0';	
    }
	if(isset($_GET['destroy'])){
		SESSION_DESTROY();
		header('Location: index.php');
	}
	
	
    function cart (){
        global $db;
		$total = 0;
        
        foreach ($_SESSION as $name => $value){
            if ($value>0){
                $id = substr($name,5,strlen($name)-5);
                $query = "SELECT * FROM tblbarang WHERE id_barang='$id'";
                $result = $db->query($query);
                while ($row=$result->fetch_assoc()){
                    $sub = $value * $row['harga'];
					$total = ($total+$sub);
                    echo $row['nama_barang']. ' x ' .$value. '<br/> @ ' .number_format($row['harga'],0)." = ".number_format($sub,0)
                    .'<br/><a class="link" href="?beli='.$id.'">[ + ]</a>
                      <a class="link" href="?remove='.$id.'">[ - ]</a>
                      <a class="link" href="?delete='.$id.'">DELETE</a>'
                    ."<br/><br/>";
                }
            }
        }
		if($total == 0){
			echo "Belanja Kosong<br/>";
		}else{
			echo "Total = Rp. ";
			echo number_format($total,0)."<br/><br/>";
			echo "<a class='destroy' href='?destroy'>Kosongkan Belanja</a><br/>";
			echo "<a class='checkout' href='view.php'>Check Out!</a>";
		}
    }

    function products(){
        global $db;
		$query = 'SELECT * FROM tblbarang';
		$result = $db->query($query);
		$jumlahdata = $result->num_rows;
		$data = 3;
		$jumlahhalaman = ceil($jumlahdata/$data);
		
		if(isset($_GET['page'])){
			$mulai = ($_GET['page']-1)*$data;
		} else {
			$mulai = 0;
		}
		$now =($mulai+$data)/$data;
	
        $query = "SELECT * FROM tblbarang WHERE jumlah > 0 ORDER BY nama_barang DESC LIMIT $mulai,$data";
        $result = $db->query($query);
    
        if ($result->num_rows){
            while ($row = $result->fetch_array()){
                echo "<div class='barang'>";
                echo "<img src='admin/images/$row[6]'/ class='gambar'><br/>";
                echo $row[0]."<br/>";
                echo $row[1]."<br/>";
                echo $row[2]."<br/>";
                echo $row[3]."<br/>";
                echo $row[4]."<br/>";
                echo $row[5]."<br/>";
                echo "<a class='beli' href='?beli=$row[0]'>Beli</a>";
                echo "</div>";
            }
        }
		
		echo "<br/><br/>";
		echo "<div class='pagging'>";
		
		if ($now>1){
			echo "<a href='?page=";
			echo $now-1;
			echo "' >Prev </a>";
		}
		for($i=1; $i<=$jumlahhalaman; $i++){
			echo "<a href='?page=$i'> $i </a>"; 
			echo "&nbsp &nbsp";
		}
		if ($now<$jumlahhalaman){
			echo "<a href='?page=";
			echo $now+1;
			echo "'>Next </a>";
		}
		
		echo "</div>";
    }
?>
