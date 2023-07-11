<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_POST['simpan'])) {
    // echo var_dump($_POST);
    $nama = $_POST['nama'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "INSERT INTO role VALUES ('','$nama')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    // Mengalihkan ke halaman list barang
    header("location:role.php");

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Role</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Tambah Role</h1>
    <form method="post">
        <div class="form-group">
            <label>Nama Role</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama role">
        </div>
    <input type="submit" name="simpan" value='Simpan' class="btn btn-primary">
    <a href="role.php" class="btn btn-warning">Kembali</a>
    </form>
</div>
</body>
</html>
