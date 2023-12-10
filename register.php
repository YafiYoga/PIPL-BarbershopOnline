<?php
require 'koneksi.php';
$nama = $_POST["nama"];
$email = $_POST["email"];
$password = $_POST["password"];
$level = "pelanggan";

$query = "INSERT INTO user (nama, email, password, level) VALUES ('$nama', '$email', '$password', '$level')";

    if (mysqli_query($connection, $query)) {
        header("Location: masuk.php");
    }else {
        echo "pendaftaran gagal : " . mysqli_error($connection);
    }