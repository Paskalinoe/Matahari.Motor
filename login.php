<?php

include 'config.php';
session_start();


if(isset($_POST['masuk']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username= '$username' and password='$password'");

    //mendapatkan hasil dari data
    $data = mysqli_fetch_assoc($query);

    //mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);

    
    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    }
    else
    {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['name'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];
        
        header("location:index.php");
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <div class="col-md-4">
    <title>Form Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style type="text/css">
        body{
            padding: 100px;
        }
    </style>
    </div>
</head>
<body> 
<div class="col-md-4">
    <!-- Alert -->
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['error']?>
        </div>
    <?php
        }
        $_SESSION['error'] = '';
    ?>

    <!-- End Alert -->
    <div class="col-md-12">
    <h1>Login</h1>

    <form method="post">
              
        <div class="form-group">     
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username">    
        </div>    
        <div class="form-group">    
            <label for="exampleInputPassword1">Password</label>  
            <input type="text" class="form-control" name="password" placeholder="Password"> 
        </div>

        <input type="submit" name="masuk" value="Masuk" class="btn btn-primary">
        
    </div>
    </form>  
</div>
</body>
</html>