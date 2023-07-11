<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM barang where id_barang='$id' ");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
    $id = $_GET['id'];
    $nama= $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE barang SET nama='$nama', harga='$harga', jumlah='$jumlah' where id_barang='$id' ");

    // mengalihkan halaman ke list barang
    header("location:barang.php");
}

?>

<!DOCTYPE html>
<html>
<head>  
    <title>Perbaruhi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Edit Barang</h1>
    <form method="post">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama barang" value="<?=$data['nama']?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?=$data['harga']?>">
        </div>
        <div class="form-group">
            <label>Jumlah Stock</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock" value="<?=$data['jumlah']?>">
        </div>
    <input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
    <a href="barang.php" class="btn btn-warning">Kembali</a>
    </form>
</div>
</body>
</html>