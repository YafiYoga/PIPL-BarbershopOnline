<?php

require_once "./helper/checkIfLogin.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pesanan Barbershop</title>
    <link rel="stylesheet" href="css/pesan.css">
    <style>
        /* Sembunyikan elemen radio bawaan */
        input[type="radio"] {
            display: none;
        }

        /* Gaya tampilan label sebagai gambar */
        label {
            cursor: pointer;
        }

        /* Gaya tampilan gambar terpilih */
        input[type="radio"]:checked+img {
            border: 2px solid #ff0000;
            /* Contoh: gambar yang dipilih akan memiliki border merah */
            /* Tambahkan gaya lain sesuai kebutuhan desain Anda */
        }
    </style>
</head>

<body>
    <!-- <form class="pesanan"> -->

    <div class="container">

        <h1> Pesanan anda</h1>
        <?php

        if (isset($_GET['id_layanan'])) {
            $id_layanan    = $_GET['id_layanan'];
        } else {
            echo "<p>Tidak ada pesanan yang dipilih.</p>";
        }
        include "koneksi.php";
        $query     = mysqli_query($connection, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
        $tampil    = mysqli_fetch_array($query);

        // if (isset($_POST['produk1']) && isset($_POST['produk2']) && isset($_POST['nama_lengkap']) && isset($_POST['layanan'])) {
        //     $produk1 = $_POST['produk1'];
        //     $produk2 = $_POST['produk2'];
        //     $nama_lengkap = $_POST['nama_lengkap'];
        //     $layanan = $_POST['layanan'];
        ?>

        <div class="order-summary">
            <p><b>Nama Layanan :</b> <?php echo $tampil['namalayanan']; ?></p>
            <p><b>Jenis Layanan :</b> <?php echo $tampil['jenislayanan']; ?></p>
            <p><b>Nomor Antrian :</b> <?php echo $tampil['jadwal'] + "1"; ?></p>
            <p><b>Harga :</b> Rp. <?php echo $tampil['harga']; ?></p>
            <!-- Tambahkan informasi pesanan lainnya jika ada -->
        </div>

        <!-- <div class="order-summary">
        <h3>Produk 2</h3>
        <p>Harga: <? //php echo $produk2['harga']; 
                    ?></p>
       Tambahkan informasi pesanan lainnya jika ada
    </div>  -->

        <!-- Tambahkan kode untuk menghitung total harga pesanan -->
        <?php
        //$total_harga = $tampil['harga'] //+ $produk2['harga'];
        ?>

        <div class="total">
            <h3>Total Harga:</h3>
            <p>Rp.<?= $tampil['harga']; ?></p>
        </div>


        <h1>Details Customer</h1>


        <form action="prosespesan.php?id_layanan=<?= $id_layanan ?>" method="post">
            <div class="inputBox">
                <span>Nama Lengkap :</span>
                <input type="text" name="nama_lengkap">
            </div>
            <div class="inputBox">
                <span>Alamat :</span>
                <input type="text" name="alamat">
            </div>
            <div class="inputBox">
                <span>No Telpn :</span>
                <input type="text" name="telepon">
            </div>



            <h2>Pilih Metode Pembayaran</h2>

            <!-- <label for="bank-transfer">Transfer Bank</label><br>
        <input type="radio" src="images/3.png" alt="submits"required><br>

        <label for="bank-transfer">Pembayaran di Barbershop</label><br>
        <input type="radio" src="images/4.png" alt="submits"required><br> -->
            <label for="pembayaran-langsung">
                <input type="radio" id="pembayaran-langsung" name="pembayaran" value="langsung">
                <img src="images/4.png" alt="Langsung">
            </label><br>

            <label for="pembayaran-transfer">
                <input type="radio" id="pembayaran-transfer" name="pembayaran" value="transfer">
                <img src="images/3.png" alt="Transfer">
            </label><br>

            <!-- Tambahkan metode pembayaran lainnya di sini -->

            <input type="submit" value="Lanjutkan Pembayaran" class="submit-btn">

        </form>

    </div>

</body>

</html>