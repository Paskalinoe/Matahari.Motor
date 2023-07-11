<?php

include 'config.php';
session_start();
include 'authcheck.php';

if(isset($_SESSION['userid']))
{
    if($_SESSION['role_id']==2)
    {
        header("Location:kasir.php");
    }
}else
{
    $_SESSION['error'] = 'Anda harus login dahulu';
    header("location:login.php");
}

$role = mysqli_query($dbconnect,"SELECT * FROM role");

if (isset($_POST['simpan'])) {
    // echo var_dump($_POST);
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "INSERT INTO user VALUES ('','$nama','$username','$password','$role_id')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    // Mengalihkan ke halaman user
    header("location:user.php");

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah User</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Tambah User</h1>
    <form method="post">
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama user">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Role Akses</label>
            <select class="form-control" name="role_id">
                <option value="">Pilih Role Akses</option>
            <?php while($row = mysqli_fetch_array($role)) { ?>
                <option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
            <?php } ?>
            </select>
        </div>
    <input type="submit" name="simpan" value='Simpan' class="btn btn-primary">
    <a href="user.php" class="btn btn-warning">Kembali</a>
    </form>
</div>
</body>
</html>
