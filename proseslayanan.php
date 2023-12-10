<?php
session_start();
require 'koneksi.php';

if (isset($_POST['proses'])){
    $user_id = $_SESSION["user_id"];
    $namalayanan = $_POST["namalayanan"];
    $harga = $_POST["harga"];
    $jenislayanan = $_POST["jenislayanan"];
    $jadwal = 1;
    $gambar=upload();

    if( !$gambar){
        return false;
    }

$query = "INSERT INTO layanan (user_id, namalayanan, harga, jenislayanan, jadwal, gambar ) VALUES ($user_id, '$namalayanan', '$harga', '$jenislayanan', '$jadwal', '$gambar' )";
        mysqli_query($connection, $query)
        or die ("Gagal Perintah SQL".mysql_error());
        $_SESSION['pesan'] = 'Data berhasil di tambahkan';
        header('location:tambahLayanan.php');
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek ada gambar
    if ($error===4){
        echo" <script>
                alert('pilih gambar terlebih dahulu');
                </script>";
        return false;
    }

    //memastikan file gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo" <script>
                alert('file bukan gambar');
                </script>";
        return false;
    }

    //nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //menyimpan gambar
    move_uploaded_file($tmpName, 'gambarproduk/' . $namaFileBaru);

    return $namaFileBaru;
}


?>