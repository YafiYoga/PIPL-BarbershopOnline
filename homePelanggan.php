<?php

require_once "./helper/checkIfLogin.php";
?>


<!DOCTYPE html>
<html>

<head>
  <title>Baron</title>
  <link rel="stylesheet" type="text/css" href="css/pelanggan1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>

  <header>
    <h1>Baron</h1>
    <div class="navbar-content">
      <nav>
        <ul class="menu">
          <li><a href="#">Beranda</a></li>
          <li><a>|</a></li>
          <li><a href="riwayat.php">Riwayat</a></li>
          <li><a>|</a></li>
          <?php
          if ($_SESSION['level'] == "barber") {
            $url = "tambahLayanan.php";
          } else if ($_SESSION['level'] == "pelanggan") {
            $url = "buatBarber.php";
          } ?>
          <li><a href="<?php echo $url; ?>">Barbershop saya</a></li>
          <li><a>|</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </nav>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                  echo $_GET['kata_cari'];
                                                                                } ?>" placeholder="Search" aria-label="Search">
        <button class="search" type="submit">Search</button>
      </form>
    </div>
  </header>

  <section class="banner">
    <img src="b.jpg" alt="Banner Shopee">
  </section>
  <section class="konten">


    <form class="h2">


      <h2>HOME BARBER</h2>
    </form>
  </section>

  <div class="row">
    <?php
    include "koneksi.php";

    //tampilkan data layanan
    if (isset($_GET['kata_cari'])) {
      $cari = $_GET['kata_cari'];
      $query = mysqli_query($connection, "SELECT * FROM layanan WHERE namalayanan LIKE '%$cari%'");
    } else {
      $query = mysqli_query($connection, "SELECT * FROM layanan");
    }

    while ($tampil = mysqli_fetch_assoc($query)) {
    }

    $ambildata = mysqli_query($connection, "select * from layanan");
    while ($tampil = mysqli_fetch_assoc($ambildata)) { ?>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="kartu-body">
            <img src="gambarproduk/<?php echo $tampil['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="text"> <?php echo $tampil['namalayanan'] ?> </h3>
              <p class="card-text">Rp. <?php echo $tampil['harga'] ?></p>
              <a href="detailproduk.php?id_layanan=<?= $tampil['id_layanan'] ?>" class="detailayanan"><button class="detailayanan">detail layanan</button></a>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
  </div>
  </section>

</body>

</html>