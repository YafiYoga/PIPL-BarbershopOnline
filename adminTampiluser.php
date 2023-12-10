<?php 

require_once "./helper/checkIfLogin.php";
require_once "./helper/checkadmin.php";
?>



<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    
    .container {
      display: flex;
      height: 100vh;
    }
    
    .sidebar {
      background-color: #6D4C3D;
      color: #fff;
      padding: 20px;
      width: 250px;
    }
    
    .sidebar h1 {
      margin: 0;
      padding: 10px 0;
      text-align: center;
      font-size: 24px;
    }
    
    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 20px 0;
    }
    
    .sidebar li {
      margin-bottom: 10px;
    }
    
    .sidebar a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .sidebar a:hover {
      color: #ffcc66;
    }
    
    .content {
      flex: 1;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .content h2 {
      margin-top: 0;
      font-size: 22px;
    }
    
    .content p {
      line-height: 1.5;
    }
    
    .content table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    
    .content th,
    .content td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    
    .content th {
      background-color: #6D4C3D;
      color: #fff;
      font-weight: normal;
    }
    
    .content td {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <h1>Dashboard</h1>
      <ul>
        <li><a href="homeadmin.php">layanan</a></li>
        <li><a href="adminTampiluser.php">Users</a></li>
        <li><a href="adminTampilTransaksi.php">transksi</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
    <div class="content">
      <h2>TABEL USER</h2>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      
      <table>
        <thead>
          <tr>
            <th>id user</th>
            <th>nama</th>
            <th>email</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
          include "koneksi.php";
          $ambildata = mysqli_query($connection, "select * from user");
          while ($tampil = mysqli_fetch_array($ambildata)){
            echo "
            <tr>
              <td>$tampil[user_id]</td>
              <td>$tampil[nama]</td>
              <td>$tampil[email]</td>
              <td><a href='?kode=$tampil[user_id]'>delete</a></td>
            </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
