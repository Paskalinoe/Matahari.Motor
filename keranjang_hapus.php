<?php
include 'config.php';
session_start();
include "authcheckkasir.php";

$id = $_GET['id'];

$cart = $_SESSION['cart'];
// print (scart);

// mengambil data secara spesifik
$k = array_filter($cart, function ($var) use ($id){
	return ($var['id']==$id);

});

foreach ($k as $key => $value)  {
	unset($_SESSION['cart'][$key]);

}

//mengembalikan urutan data (reset urutan )
$_SESSION['cart'] = array_values($_SESSION['cart']);

header('location: kasir.php');

?>