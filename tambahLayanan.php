<?php

require_once "./helper/checkIfLogin.php";

if ($_SESSION['level'] != "barber") {
  header("location:buatBarber.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>tambah layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/tambahLayanan1.css">

</head>

<body>
  <header>
    <h1>Barber saya</h1>
    <a style="text-decoration:none" href="#">tambah layanan</a>
    <a>|</a>
    <a style="text-decoration:none" href="daftarantrian.php">antrian</a>
    <a>|</a>
    <a style="text-decoration:none" href="selesaiantrian.php">selesai</a>
    <a>|</a>
    <a style="text-decoration:none" href="homePelanggan.php">Home</a>
  </header>
  <div class="layanan">
    <div class="kotak">
      <section class="konten">
        <form class="h2">
          <h2>Tambah Layanan</h2>
        </form>
      </section>
      <form action="proseslayanan.php" method="POST" enctype="multipart/form-data">
        <section class="content">

          <?php if (isset($success_message)) { ?>
            <div class="success-message"><?php echo $success_message; ?></div>
          <?php } ?>

          <div class="form-group">
            <label for="nama">*Nama Layanan</label>
            <input type="text" id="namalayanan" name="namalayanan" placeholder="nama layanan anda" required="namalayanan">
          </div>
          <div class="form-group">
            <label for="nama">*Jenis layanan</label>
            <input type="text" id="jenislayanan" name="jenislayanan" placeholder="Onsite / Home Barbers" required="namalayanan">
          </div>

          <div class="form-group">
            <label for="email">*Harga</label>
            <input type="text" id="harga" name="harga" placeholder="harga layanan anda" required="jadwal">
          </div>

          <div class="form-group">
            <label for="gambar">*Gambar</label>
            <input type="file" id="gambar" name="gambar">
          </div>

          <button type="submit" value="simpan" name="proses">kirim</button>
          <button type="button" onclick="goBack()">Kembali</button>

    </div>
    <script>
      function goBack() {
        window.history.back();
      }
    </script>
    </form>
    </section>
    </form>

    <section class="konten">
      <div class="container">
        <h2>Produk Saya</h2>
        <div class="row">
          <?php
          include "koneksi.php";

          $ambildata = mysqli_query($connection, "select * from layanan where user_id = '$_SESSION[user_id]'");
          while ($tampil = mysqli_fetch_assoc($ambildata)) { ?>
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="gambarproduk/<?php echo $tampil['gambar'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="title-text"> <?php echo $tampil['namalayanan'] ?> </h3>
                  <p class="card-text">Rp. <?php echo $tampil['harga'] ?></p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>

          <?php } ?>
        </div>
      </div>
    </section>
</body>

</html>