<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id' ");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
    $id = $_GET['id'];
    $nama= $_POST['nama'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE role SET nama='$nama' where id_role='$id' ");

    // mengalihkan halaman ke role
    header("location:role.php");
}

?>

<!DOCTYPE html>
<html>
<head>  
    <title>Perbaruhi Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Tambah Role</h1>
    <form method="post">
        <div class="form-group">
            <label>Nama Role</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama role" value="<?=$data['nama']?>">
        </div>
    <input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
    <a href="role.php" class="btn btn-warning">Kembali</a>
    </form>
</div>
</body>
</html>