<?php 
session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION['name']);

    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['total']);
    unset($_SESSION['pmode']);
    unset($_SESSION['cart']);

    header("Location: index.php");
}
?>