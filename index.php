<?php
require_once "core/init.php";
$tampil = tampilkan_data();
if(isset($_POST['submit'])){
    $kddvd      =$_POST['kddvd'];
    $nama       =$_POST['nama'];
    $jumlah     =$_POST['jumlah'];
    $tanggal    =$_POST['tanggal'];
   
    $kode      =substr($kddvd,0,2);
    if($kode =='HO'){
        $harga = 25000;
    }elseif($kode=='AC'){
        $harga = 20000;
    }elseif($kode =='DR'){
        $harga = 27500;
    }
    $total_harga = $harga * $jumlah;
    if($total_harga >= 200000 && $total_harga <300000){
        $potong =$total_harga * 0.02;
        $final = $total_harga - $potong;
    }elseif($total_harga >= 300000 && $total_harga < 200000){
        $potong =$total_harga * 0.01;
        $final = $total_harga - $potong;
    }else{
        $final = $total_harga;
    }

    $query  = "INSERT INTO tbl_handri (kdvcd, nama, jumlah, tgl_pinjam, total )
			    VALUES ('$kddvd', '$nama', '$jumlah', '$tanggal', '$final')";
    $sql	= mysqli_query($link, $query);
    if($sql){
		echo "<meta http-equiv = 'refresh' content = '1;url=index.php'>";
	}
	else{
		echo 'ada masalah saat tambah data'; die();
	}
     
    

}
?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>
        <div  class="container">
            <div class="page-title">
                <h2 class="menu-title"> Aplikasi Rental DVD  </h2>
            </div>
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-container">
                            <div class="heading"></div>

                            <div class="row widget-content padded">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Kode DVD</label>
                                        <input type="text" class="form-control" name="kddvd">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama</label>
                                        <input type="text" class="form-control" name="nama">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Jumlah Pinjam</label>
                                        <input type="number" class="form-control" name="jumlah">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal">                                        
                                    </div>
                                    
                                    
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    <div>
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-container padded fluid-height">
                            <input type="submit" class="btn btn-success" name="submit" value="Save">
                            <a href="index.html" class="btn btn-default">Cancel</a> 
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div align="center" class="container">
            <div class="page-title">
                <h2 class="menu-title"> Data Transaksi  </h2>
            </div>
            <div  class="row">
                <div  class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode DVD</th>
                                <th>Jenis DVD</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Peminjam</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $all_total = '';while ($row = mysqli_fetch_assoc($tampil)): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['kdvcd']; ?></td>
                                <td>
                                <?php 
                                $all_total +=$row['total'];
                                $kode      =substr($row['kdvcd'],0,2);
                                if($kode =='HO'){
                                    echo 'Horor';
                                }elseif($kode=='AC'){
                                    echo 'Action';
                                }elseif($kode =='DR'){
                                    echo 'Drama';
                                }
                                 ?>
                                </td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['tgl_pinjam']; ?></td>
                                <td><?= $row['total']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'];?>">Edit</a>
                                    <a href="delete.php?id=<?= $row['id'];?>">Hapus</a>
                                </td>
                            </tr>
				
			                <?php endwhile; ?>
                            
                            <?php ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td><?php echo "Rp. ". number_format((float) $all_total);?></td>
                            </tr>                              
                                
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script>

        </script>
    </body>
    
</html>