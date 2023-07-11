<?php
session_start();

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <script src="fontawesome/all.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fa fa-arrow-right" id="open"></i>
        </label>
        <div class="sidebar">
            <div class="top">
               <?=$_SESSION['name']?>
            </div>  
            <ul>
                <li><a class="#" href="barang.php">Barang</a></li>
                <li><a class="#" href="role.php">Role</a></li>
                <li><a class="#" href="user.php">User</a></li>
                <li><a class="#" href="logout.php">Logout</a></li>
            </ul>
        </div>
        <section>
            <h1>Matahari Motor</h1>
        </section>
    </main>
</body>
</html>