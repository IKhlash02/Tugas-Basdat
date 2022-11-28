<?php 
 
 include 'config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}

$tampil = mysqli_query($conn, "SELECT * from kos"); 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kos-Kosan</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a29bfe;">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex me-auto" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="image/profile.png"  width="30" height="24">
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="profile_admin.php">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->
<!-- Gambar -->
<div class="top-wrapper">
      <div class="container">
        <h1>Selamat Datang</h1>
        <?php echo "<h1>" . $_SESSION['nama']. "</h1>"; ?>
        <p>Kosan adalah platform online untuk mencari kosan.</p>
        <p>Kami menawarkan kosan terbaik yang dapat anda tempati.</p>
        <div class="btn-wrapper">
          <a href="#" class="btn signup"></a>
          <p></p>
          <a href="#" class="btn facebook"><span class="fa fa-facebook"></span></a>
          <a href="#" class="btn twitter"><span class="fa fa-twitter"></span></a>
        </div>
      </div>
    </div>
<!-- akhir Gambar -->

<!-- grid -->
<div class="container">
      <h2 class="mt-3 text-center" >Daftar Kos-Kosan</h2>
      <div class="row">
      <?php
      $i = 0;
      while($hasil = mysqli_fetch_array($tampil)){ 
        if($i == 3) {
          $i = 1;
          echo "<div class='w-100 d-none d-md-block'></div>";
          
        }
      $nama = stripslashes ($hasil['nama_kost']);
      $alamat = stripslashes ($hasil['alamat']);
      $jenis = stripslashes ($hasil['jenis']);
      $status = stripslashes ($hasil['status']);
      $fasilitas = stripslashes ($hasil['fasilitas']);
      $perbulan = stripslashes ($hasil['perbulan']);
      $per6bulan = stripslashes ($hasil['per6bulan']);
      $pertahun = stripslashes ($hasil['pertahun']);
        ?>
        <div class="col-md-3">
          <div class="card">
            <img src="image/image1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?php echo $nama?></h5>
              <p class="card-text"><?php echo $alamat?></p>
              <p class="card-text" >Mulai <?php echo $perbulan?>/bulan</p>
              <a href="#" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        <?php
        $i++;
         }
         ?>
      </div>
 </div>
<!-- Grid -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

