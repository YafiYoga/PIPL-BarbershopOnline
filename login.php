<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$nama = $_POST['nama'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connection,"select * from user where nama='$nama' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		// $_SESSION['nama'] = $nama;
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['level'] = $data['level'];
		// alihkan ke halaman dashboard admin
		header("location:homeadmin.php");
 
	// cek jika user login sebagai pengurus
	}else{
		// buat session login dan username
		$_SESSION["user_id"] = $data['user_id'];
		$_SESSION['level'] = $data['level'];
		// alihkan ke halaman dashboard pengurus
		header("location:homepelanggan.php");
 
	}
}else{
	header("location:masuk.php?pesan=gagal");
}
 
?>