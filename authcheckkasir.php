<?php

if(isset($_SESSION['userid']))
{
    if($_SESSION['role_id']==1)
    {
        header("Location:index.php");
    }
}else
{
    $_SESSION['error'] = 'Anda harus login dahulu';
    header("location:login.php");
}

?>