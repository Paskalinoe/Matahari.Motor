<?php

include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query("SELECT * FROM barang");



?>

<!DOCTYPE html>
<html>
<head>
    <title>List Barang</title>
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





    <h1>List Barang</h1>
    <a href="barang_add.php" class="btn btn-primary">Tambah data</a> | <a href="index.php">Kembali</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>ID Barang</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
        <?php

        while ($row = $view->fetch_array()) { ?>

        <tr>
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td align="right"><?= number_format($row['harga']) ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>
                <a href="barang_edit.php?id=<?= $row['id_barang'] ?>">Edit</a> |
                <a href="barang_hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('Apakah anda yakin hapus?')" >Hapus</a>
            </td>
        </tr>

        <?php }
        ?>

    </table>
</div>
</body>
</html>    
