<?php
include 'config.php';
session_start();
include "authcheckkasir.php";

//menghilangkan Rp pada nominal
$bayar = preg_replace('/\D/', '', $_POST['bayar']);

// print r(preg_replace('/\D/, '', $_POST['total']));

// print_r($_SESSION['cart'])

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$nama_kasir = $_SESSION['name'];
$kembali = $bayar - $total;


//insert ke tabel transaksi
mysqli_query($dbconnect, "INSERT INTO transaksi (
	id_transaksi,tanggal_waktu,nomor,total,nama_kasir,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor','$total','$nama_kasir','$bayar','$kembali')");

//mendapatkan id transaksi baru 
$id_transaksi = mysqli_insert_id($dbconnect);

//insert ke detail transaksi
foreach ($_SESSION['cart'] as $key => $value) {

	$id_barang = $value['id'];
	$harga = $value['harga'];
	$qty = $value['qty'];
	$tot = $harga*$qty;

mysqli_query($dbconnect, "INSERT INTO transaksi_detail (
	id_transaksi_detail,id_transaksi,id_barang,harga,qty,total) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$tot')");

// $sum += $value[ 'harga'] $value['qty'];
}

header("location:transaksi_selesai.php?idtrx=".$id_transaksi);



?>