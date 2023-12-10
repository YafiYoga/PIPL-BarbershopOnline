<?php 
session_start();

if($_SESSION['level']!="admin"){
    header("location:homepelanggan.php");
}

?>