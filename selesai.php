<?php 

require_once "./helper/checkIfLogin.php";
include "koneksi.php";

$id_pesanan = $_GET['id_pesanan'];

$query = "UPDATE antrian
            SET status = 'selesai'
            WHERE id_pesanan = $id_pesanan";

if (mysqli_query($connection, $query)) {
    header("location:daftarantrian.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
?>