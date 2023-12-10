<?php 

require_once "./helper/checkIfLogin.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat</title>
  <link rel="stylesheet" href="css/riwayat.css">
</head>

<body>
  <header>
    <h1>Riwayat</h1>
  </header>
  <section class="content">
    <?php 
    include "koneksi.php";
    $ambildata = mysqli_query($connection, "select * from layanan inner join antrian ON layanan.id_layanan = antrian.id_layanan where antrian.id_customer = '$_SESSION[user_id]'");
    while ($tampil = mysqli_fetch_assoc($ambildata)){
    ?>
        <div class="card-horizontal">
          <div class="card-image">
            <img src="gambarproduk/<?php echo $tampil['gambar'] ?>" alt="Gambar Produk">
          </div>
          <div class="card-content">
            <h2 class="product-name"><?=$tampil['namalayanan']?></h2>
            <p class="product-price"><?=$tampil['harga']?></p>
            <p class="product-status"><?=$tampil['status']?></p>
          </div>
          <div class="card-btn">
            <a href="buktiantrian.php?id_pesanan=<?=$tampil['id_pesanan']?>"><button class="btn-detail">detail pesanan</button></a>
          </div> 
        </div>
    <?php } ?>
  </section>
</body>

</html>