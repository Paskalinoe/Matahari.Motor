<?php

include 'config.php';
session_start();
include 'authcheck.php';


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM `transaksi` WHERE id_transaksi='$id' ");

    header("location:laporan.php");

}

?>