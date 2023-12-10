<?php 

require_once "./helper/checkIfLogin.php";

if($_SESSION['level']=="barber"){
  header("location:tambahLayanan.php");
}

?>



<!DOCTYPE html>
<html>
<head>
  <title>BUAT BARBERSHOP</title>
  <link rel="stylesheet" type="text/css" href="css/tambahbarber.css">
</head>
<body>
  <header>
    <h1>BUAT BARBERSHOP</h1>
  </header>
  <div class="layanan">
    <div class="kotak">
  <h1>Anda Belum Memiliki toko</h1>
  <form action="prosesbarber.php" method="POST" >
  <section class="content">
   
      <div class="form-group">
      <label for="nama">*Nama barbershop</label>
      <input type="text" id="namabarbershop" name="namabarbershop" placeholder="Masukan nama barber" required>
      </div>

      <div class="form-group">
      <label for="text">*notelp</label>
      <input type="text" id="notelp" name="notelp" placeholder="Masukkan nomor telepon" required>
      </div>

      <div class="form-group">
      <label for="text">*Alamat</label>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat barber" required>
      </div>

      <button type="submit" value="simpan" name="proses">kirim</button>
      <button type="button" onclick="goBack()">Kembali</button>
                               
</div>
    </form>
  </section>
  <script>
        function goBack() {
          window.history.back();
        }
      </script>
  </form>
  
</body>
</html>

