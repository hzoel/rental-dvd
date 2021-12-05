<?php
	require_once "core/init.php";
	
	$error="";
	$id = $_GET['id'];
	if(isset($_GET['id']))
		{
			 $table_single  = tampilkan_per_single($id);
			 while ($row 	= mysqli_fetch_assoc($table_single))
			 {
			 	$kdvcd      = $row['kdvcd'];
				$nama 		= $row['nama'];
				$jumlah	    = $row['jumlah'];
				$tgl_pinjam = $row['tgl_pinjam'];
				$total 		= $row['total'];

			 	
			 }
		}
	if(isset($_POST['submit']))
		{
            $kdvcd      =$_POST['kdvcd'];
            $nama       =$_POST['nama'];
            $jumlah     =$_POST['jumlah'];
            $tanggal    =$_POST['tanggal'];

            $query  		= " UPDATE tbl_handri SET 
            kdvcd			='$kdvcd',
            nama 			='$nama', 
            jumlah			='$jumlah',
            tgl_pinjam 		='$tanggal'
            WHERE id 		= '$id' ";
            $sql	= mysqli_query($link, $query);
           

          
            if($sql){
                echo "<meta http-equiv = 'refresh' content = '1;url=index.php'>";
            }
            else{
                echo 'ada masalah saat tambah data'; die();
            }
            
			
			
          

				
			
		}

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>
        <div class="container">
            <div class="page-title">
                <h2 class="menu-title"> Aplikasi Rental DVD  </h2>
            </div>
            <form action="" method="post">
             <label style="font-weight: bold;">Kode DVD</label>
                <br>
                <input type="text"  name="kdvcd" value="<?= $kdvcd ?>"> 
                <br>
                
                <label style="font-weight: bold;">Nama</label>
                <br>
                <input type="text"  name="nama"  value="<?= $nama ?>"> 
                <br>
                
                <label style="font-weight: bold;">Jumlah Pinjam</label>
                <br>
                <input type="number" name="jumlah"  value="<?= $jumlah ?>"> 
                <br>
                
                <label style="font-weight: bold;">Tanggal</label>
                <br>
                <input type="date" name="tanggal"  value="<?= $tgl_pinjam ?>">  
                <br> 
                <br>

                <input type="submit" class="btn btn-success" name="submit" value="Save">
            </form>

        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script>

        </script>
    </body>
    
</html>