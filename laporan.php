<?php

include 'config.php';
session_start();



    
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">

<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

    <div class="alert alert-success" role="alert"><strong>Berhasil</strong>
    <?=$_SESSION['success']?>
    </div>

<?php }

    $_SESSION['success'] = '';

?>


    
    <h1>List Transaksi</h1>
    <a href="cetak.php" class="btn btn-primary">Cetak</a> | <a href="index.php">Kembali</a>

    <hr>

    <div class="row">
        <form method="post" class="form-inline">
            <div class="col-md-4">
                <input type="date" name="tgl_mulai" class="form-control">
                <input type="date" name="tgl_selesai" class="form-control">
                <button type="submit" name="filter_tgl" value="btn btn-info">Filter</button>
            </div>
        </form>
    </div>
    
    <br>
    
    <table class="table table-bordered">
        <tr>
            <th>Nomor</th>
            <th>Tanggal Waktu</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Nama Kasir</th>
            <th>Total</th>
        </tr>
        
        <?php
        
        if(isset($_POST['filter_tgl']))
        {
            $mulai = $_POST['tgl_mulai'];
            $selesai = $_POST['tgl_selesai'];
            $data = mysqli_query($dbconnect,"SELECT * FROM barang, transaksi, transaksi_detail WHERE transaksi.id_transaksi = transaksi_detail.id_transaksi AND barang.id_barang = transaksi_detail.id_barang AND tanggal_waktu BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 1 DAY)");
        } else {
            $data = mysqli_query($dbconnect,"SELECT * FROM barang, transaksi, transaksi_detail WHERE transaksi.id_transaksi = transaksi_detail.id_transaksi AND barang.id_barang = transaksi_detail.id_barang");
        }
            
        

        
        

        
        while ($r = mysqli_fetch_array($data)) { 
    
        ?>

        <tr>
            <td><?=$r ['nomor']?></td>
            <td><?=$r ['tanggal_waktu']?></td>
            <td><?=$r ['nama']?></td>
            <td><?=$r ['qty']?></td>
            <td><?=$r ['nama_kasir']?></td>
            <td><?=$r ['total']?></td>
        </tr>

        <?php }
        ?>


    </table>
</div>
</body>
</html>   