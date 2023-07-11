<?php

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