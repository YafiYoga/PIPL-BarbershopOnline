<?php 
require_once "./helper/checkIfLogin.php";
include "koneksi.php";
 

$query    =mysqli_query($connection, "SELECT * FROM user WHERE user_id='$_SESSION[user_id]'");
$tampil1    =mysqli_fetch_array($query);

$ambil    =mysqli_query($connection, "SELECT * FROM antrian WHERE id_pesanan='$_GET[id_pesanan]'");
$tampil2    =mysqli_fetch_array($ambil);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pemesanan Berbershop</title>
    <link rel="stylesheet" href="css/buktiantrian.css">
</head>

<body>
    
 <div class="container">

<div class="baron">
        <h1 class="nama">Baron</h1>
    </div>

            <h1 class="judul">*Bukti Pemesanan Barbershop</h1>
   <div class="detail-pemesan">
            <h2 class="Customer">Customer Detail</h2>
            <h4 class="Customer">Nama   :<?=$tampil1['nama'];?></h4>
            <h4 class="Customer">Alamat :<?=$tampil1['alamat'];?></h4>
            <h4 class="Customer">No Hp  :<?=$tampil1['telepon'];?></h4>
            <h4 class="Customer">No Antrian :<?=$tampil2['no_antrian'];?></h4>
        </div>

        <h1 class="judul">*Detail Pesanan</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Layanan</th>
                     <th>Nama Layanan</th>
                    <th>Metode Pembayaran</th>
                     <th>Harga Layanan</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td class="no">1</td>
                    <td><?=$tampil2['jenis_layanan'];?></td>
                    <td><?=$tampil2['nama_layanan'];?></td>
                    <td><?=$tampil2['pembayaran'];?></td>
                    <td>Rp.<?=$tampil2['harga'];?></td>
                </tr>

            </tbody>
            <tfoot>
                <tr class="total">
                    <td  colspan="4">Total Tagihan</td>
                    <td>Rp.<?=$tampil2['harga'];?></td>
                </tr>
            </tfoot>
        </table>
         <h3 class="note">*Terimakasi Telah Pesan Layanan Di Baron</h3>

         <a style="text-decoration:none" href="homePelanggan.php">
         <div class="Kembali">
        <button class="tombol-kembali">Kembali</button>
        </a>
    </div>
    </div>
</body>
</html>
    
</body>

</html>