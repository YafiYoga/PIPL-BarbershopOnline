<?php
require_once "./helper/checkIfLogin.php";
require 'koneksi.php';

if (isset($_POST['proses'])) {
    $jambuka = $_POST["jambuka"];
    $jamtutup = $_POST["jamtutup"];
    $haribuka = $_POST["haribuka"];
    $haritutup = $_POST["haritutup"];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO jadwal (jambuka, jamtutup, haribuka, haritutup) VALUES ('$jambuka', '$jamtutup', '$haribuka', '$haritutup')";

    if (mysqli_query($connection, $query)) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
?>
