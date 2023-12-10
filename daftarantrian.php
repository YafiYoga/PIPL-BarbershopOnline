<?php
require_once "./helper/checkIfLogin.php";
include "koneksi.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/daftarantrian.css">
</head>

<body>
    <header>
        <h1>Barber saya</h1>
        <a style="text-decoration:none" href="tambahLayanan.php">tambah layanan</a>
        <a>|</a>
        <a style="text-decoration:none" href="daftarantrian.php">antrian</a>
        <a>|</a>
        <a style="text-decoration:none" href="selesaiantrian.php">selesai</a>
        <a>|</a>
        <a style="text-decoration:none" href="homePelanggan.php">Home</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama layanan</th>
                <th>Jenis layanan</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Metode Pembayaran</th>
                <th>antrian</th>
                <th>Harga</th>
                <th>status</th>
                <th>aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $ambildata = mysqli_query($connection, "SELECT * FROM user INNER JOIN antrian ON user.user_id = antrian.id_customer WHERE antrian.id_barber = $_SESSION[user_id] AND antrian.status = 'mengantri'");
            while ($tampil = mysqli_fetch_assoc($ambildata)) {
                $no++;
                echo "
                <tr>
                    <td>$no</td>
                    <td>$tampil[nama_layanan]</td>
                    <td>$tampil[jenis_layanan]</td>
                    <td>$tampil[nama]</td>
                    <td>$tampil[alamat]</td>
                    <td>$tampil[pembayaran]</td>
                    <td>$tampil[no_antrian]</td>
                    <td>$tampil[harga]</td>
                    <td>$tampil[status]</td>
                    <td><a href='selesai.php?id_pesanan=$tampil[id_pesanan]'>selesaikan</a></td>
                </tr>
                ";
                }
            ?>
        </tbody>

    </table>
</body>

</html>