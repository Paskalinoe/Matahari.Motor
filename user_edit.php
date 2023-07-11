<?php

include 'config.php';
session_start();
include 'authcheck.php';

$role = mysqli_query($dbconnect,"SELECT * FROM role");

if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM user where id_user='$id' ");
    $data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE user SET nama='$nama', username='$username', password='$password', role_id='$role_id' where id_user='$id' ");

    
    $_SESSION['success'] = 'Berhasil memperbaruhi data';

    // mengalihkan halaman ke user
    header("location:user.php");
}

?>

<!DOCTYPE html>
<html>
<head>  
    <title>Perbaruhi user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Tambah user</h1>
    <form method="post">
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?=$data['nama']?>">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password" value="<?=$data['password']?>">
        </div>
        <div class="form-group">
            <label>Role Akses</label>
            <select class="form-control" name="role_id">
                <option value="">Pilih Role Akses</option>

        <?php while($row = mysqli_fetch_array($role)){?>

            <option value="<?=$row['id_role']?>" <?=$row['id_role']==$data['role_id']?'selected':''?> ><?=$row['nama']?></option>

            <?php } ?>
            </select>
        </div>
    <input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
    <a href="user.php" class="btn btn-warning">Kembali</a>
    </form>
</div>
</body>
</html>