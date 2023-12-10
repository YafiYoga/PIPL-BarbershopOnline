<!DOCTYPE html>
<html>
<head>
  <title>tambah layanan</title>
  <link rel="stylesheet" type="text/css" href="css/tambahLayanan.css">
</head>
<body>
  <header>
    <h1>Halaman jadwal barbershop</h1>
  </header>
  <div class="layanan">
    <div class="kotak">
  <h1>Jadwal Barbershop</h1>
  <form action="prosesjadwal.php" method="POST" >
  <section class="content">
   
    <div class="form-group">
      <label for="nama">*jam buka</label>
      <input type="text" id="jambuka" name="jambuka" placeholder="Masu" required="namalayanan">
    </div>
    <div class="form-group">
      <label for="text">*Jam tutup</label>
      <input type="text" id="jamtutup" name="jamtutup" placeholder="Masukkan email" required="jenislayanan">
      </div>

      <div class="form-group">
      <label for="email">*Hari buka</label>
      <input type="text" id="haribuka" name="haribuka" placeholder="Masukkan email" required="kategorilayanan">
      </div>

      <div class="form-group">
      <label for="email">*Hari tutup</label>
      <input type="text" id="haritutup" name="haritutup" placeholder="Masukkan email" required="price">
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
  
</body>
</html>

