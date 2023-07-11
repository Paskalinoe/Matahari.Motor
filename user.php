<?php

include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN role as r ON u.role_id=r.id_role");

?>

<!DOCTYPE html>
<html>
<head>
    <title>List User</title>
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



    <h1>List User</h1>
    <a href="user_add.php" class="btn btn-primary">Tambah User</a> | <a href="index.php">Kembali</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role Akses</th>
            <th>Aksi</th>
        </tr>
        <?php

        while ($row = $view->fetch_array()) { ?>

        <tr>
            <td><?= $row['id_user'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['nama_role'] ?></td>
            <td>
                <a href="user_edit.php?id=<?= $row['id_user'] ?>">Edit</a> |
                <a href="user_hapus.php?id=<?= $row['id_user'] ?>" onclick="return confirm('Apakah anda yakin hapus?')" >Hapus</a>
            </td>
        </tr>

        <?php }
        ?>

    </table>
</div>
</body>
</html>    