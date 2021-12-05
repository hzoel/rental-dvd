<?php
$potongan       = '';
$tambahan       = '';
$biaya_extra    = '';
if(isset($_POST['submit'])){
    $nama       =$_POST['nama'];
    $kode       =$_POST['kode'];
    $jumlah     =$_POST['jumlah'];
    $days       =$_POST['days'];
    $pembayaran =$_POST['pembayaran'];
    $nama_kamar =substr($kode,0,2);
     
    if($nama_kamar=='AL'){
        $nama_kamar = 'Alamanda';
        $harga      = 450000;
    }elseif($nama_kamar=='BG'){
        $nama_kamar = 'Bougenvile';
        $harga      = 350000;
    }elseif($nama_kamar=='CR'){
        $nama_kamar = 'Crysan';
        $harga      = 375000;
    }else {
        $nama_kamar = 'Kemuning';
        $harga      = 425000;
    }
    $nomor      =substr($kode,-3);
    $lantai     =substr($kode,2,-3);
    if($pembayaran =='Kartu Kredit'){
        $tambahan = $harga * 0.02;
    }elseif($pembayaran == 'Debit'){
        $potongan = $harga * 0.015;
    }
    
    if($jumlah > 2){
        $biaya_extra = ($jumlah - 2) * 75000;
        $tambahan+=$biaya_extra;
    }

    $total = ($days * $harga) + $tambahan - $potongan;
    



}
?>
<!doctype html>
<html>
    <head>
        <title>Tugas UTS Handri 2016141786</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>
        <div class="container">
            <div class="page-title">
                <h2 class="menu-title"> Kwitansi  </h2>
            </div>
            <form action="#" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-container">
                            <div class="heading"></div>

                            <div class="row widget-content padded">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $nama ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama Kamar</label>
                                        <input type="text" class="form-control" value="<?= $nama_kamar ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nomor</label>
                                        <input type="text" class="form-control" value="<?= $nomor ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Lama Hari</label>
                                        <input type="text" class="form-control" value="<?= $days ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Potongan</label>
                                        <input type="text" class="form-control" value="<?= "Rp. ".number_format((float)$potongan, 0, '.', ','); ?>">                                     
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Tambahan</label>
                                        <input type="text" class="form-control" value="<?= "Rp. ". number_format((float)$tambahan, 0, '.', ',')  ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Total Harga</label>
                                        <input type="text" class="form-control" value="<?="Rp. ". number_format((float)$total, 0, '.', ','); ?>" >                                        
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Kode Booking</label>
                                            <input type="text" class="form-control" value="<?=$kode;?>">                                        
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Lantai</label>
                                            <input type="text" class="form-control" value="<?= $lantai ?>">                                        
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Jumlah Orang</label>
                                            <input type="text" class="form-control" value="<?= $jumlah ?>">                                        
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Jenis Pembayaran</label>
                                            <input type="text" class="form-control" value="<?= $pembayaran ?>">                                        
                                        </div>
                                        <div class="form-group">
                                            <label style="font-weight: bold;">Biaya Springbad tambahan</label>
                                            <input type="text" class="form-control" value="<?="Rp. ". number_format((float)$biaya_extra, 2, '.', ''); ?>">                                        
                                        </div>
                                                                              
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
        
        

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-2.1.4.min.js"></script>
    </body>
    
</html>