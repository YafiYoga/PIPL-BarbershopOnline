<?php
session_start();
// Lakukan koneksi ke database, sesuaikan dengan konfigurasi Anda
include "koneksi.php";

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$id_cutomer = $_SESSION['user_id'];

$query = "SELECT * FROM layanan
          INNER JOIN antrian ON layanan.id_layanan = antrian.id_layanan
          WHERE antrian.id_customer = $id_cutomer";

// Eksekusi query
$result = mysqli_query($connection, $query);

// Buat variabel untuk menampung hasil query dalam bentuk array
$hasil_query = array();

// Cek apakah query berhasil dieksekusi
if ($result) {
    // Loop untuk mendapatkan setiap baris hasil query
    while ($row = mysqli_fetch_array($result)) {
        // Tambahkan baris data ke dalam variabel hasil_query
        $hasil_query[] = $row;
    }
    // Bebaskan memori dari hasil query
    mysqli_free_result($result);
} else {
    echo "Error executing query: " . mysqli_error($connection);
}

// Tutup koneksi ke database
mysqli_close($connection);

// Cetak hasil array
print_r($hasil_query);
?>
