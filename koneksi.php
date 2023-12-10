<?php
$host = "localhost"; 
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$database = "baron"; // ganti dengan nama database Anda

$connection = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
// if (!$connection){
//     die('koneksi gagal : ') . mysqli_connect_error();
// }else{
// echo 'koneksi berhasil';
// }
