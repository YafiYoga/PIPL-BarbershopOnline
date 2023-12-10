<?php
require_once "./helper/checkIfLogin.php";
require 'koneksi.php';

if(isset($_GET['id_layanan'])){
    $id_layanan    =$_GET['id_layanan'];
}
else {
    die ("Error. No ID Selected!");    
}

$ambil    =mysqli_query($connection, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
$tampil    =mysqli_fetch_array($ambil);


$no_antrian = $tampil['jadwal']+"1";
$id_barber = $tampil['user_id'];
$id_customer = $_SESSION["user_id"];
$nama_layanan = $tampil['namalayanan'];
$jenis_layanan = $tampil['jenislayanan'];
$pembayaran = $_POST["pembayaran"];
$status = "mengantri" ;
$harga = $tampil['harga'];

$query = "INSERT INTO antrian (id_layanan, no_antrian, id_barber, id_customer, nama_layanan,jenis_layanan, pembayaran, status, harga) VALUES ('$id_layanan', '$no_antrian', '$id_barber', '$id_customer', '$nama_layanan', '$jenis_layanan', '$pembayaran', '$status', '$harga')";

    if (mysqli_query($connection, $query)) {

        $id_baru = mysqli_insert_id($connection);
        // Tutup koneksi ke database
        

        mysqli_query($connection, "UPDATE layanan 
                                    SET jadwal = '$no_antrian'
                                    WHERE id_layanan=$id_layanan ");

        
        mysqli_close($connection);
        header("Location: buktiantrian.php?id_pesanan=$id_baru");
    }else {
        echo "pemesanan gagal : " . mysqli_error($connection);
    }