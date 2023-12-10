
<?php 

require_once "./helper/checkIfLogin.php";
?>

<?php
    if(isset($_GET['id_layanan'])){
        $id_layanan    =$_GET['id_layanan'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($connection, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
    $tampil    =mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Barang</title>
  <link rel="stylesheet" href="css/detailproduk.css">
  
</head>

<body>
  <div class="container">
    <div class="product-image">
      <img src="gambarproduk/<?php echo $tampil['gambar'] ?>" alt="Product Image">
    </div>
    <div class="product-details">
      <h1> <?php echo $tampil['namalayanan']?></h1>
      <p class="product-price">Rp. <?php echo $tampil['harga']?></p>
      <p class="product-description">
        <p><b>Jenis Layanan           :</b> <?php echo $tampil['jenislayanan']; ?></p>
        <p><b>Nomor Antrian saat ini  :</b> <?php echo $tampil['jadwal']; ?></p>
      </p>
      <h2>Product Details</h2>
      <p class="product-description">
        Vestibulum auctor diam ac lectus ullamcorper, vitae efficitur nisl semper. Donec auctor dolor a dolor
        suscipit interdum. Sed pellentesque auctor tincidunt. Donec at nisi lectus. Nullam consectetur sagittis
        tristique. Proin lobortis tincidunt tristique. Nullam vel nibh id nisi feugiat ultricies id nec tellus.
      </p>
      <a href="pesan.php?id_layanan=<?=$tampil['id_layanan']?>" class="btn-message">Pesan</a>
      <a href="homepelanggan.php" class="btn-message">Kembali</a>
    </div>
  </div>
</body>

</html>
