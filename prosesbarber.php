<?php
require 'koneksi.php';
session_start();

if (isset($_POST['proses'])) {
    $user_id = $_SESSION["user_id"];
    $namabarbershop = $_POST["namabarbershop"];
    $notelp = $_POST["notelp"];
    $alamat = $_POST["alamat"];

    // Query untuk merubah setatus user
    // $query = "INSERT INTO barber (namabarbershop, telepon,  alamat, level) VALUES ('$namabarbershop','$notelp','$alamat','barber')";
    $query = "UPDATE user
            SET nama = '$namabarbershop', level = 'barber',  telepon = '$notelp', alamat = '$alamat'
            WHERE user_id = $user_id";

    if (mysqli_query($connection, $query)) {
        $_SESSION["level"] = 'barber';
        header("location:tambahLayanan.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
?>
