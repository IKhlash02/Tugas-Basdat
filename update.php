<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
//jika belum login maka kembali ke index
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
//mengambil admin_id
if (isset($_SESSION['admin_id'])) {
    $id =$_SESSION['admin_id'];
}

//ambil data di url
$id_kos = $_GET["kos_id"];

//Ambil querynya
$tampil = mysqli_query($conn, "SELECT * from kos WHERE kos_id=$id_kos"); 
$hasil = mysqli_fetch_array($tampil);
    $nama = stripslashes ($hasil['nama_kost']);
    $alamat = stripslashes ($hasil['alamat']);
    $jenis = stripslashes ($hasil['jenis']);
    $status = stripslashes ($hasil['status']);
    $fasilitas = stripslashes ($hasil['fasilitas']);
    $perbulan = stripslashes ($hasil['perbulan']);
    $per6bulan = stripslashes ($hasil['per6bulan']);
    $pertahun = stripslashes ($hasil['pertahun']);

if (isset($_POST['submit'])) {
    $nama= $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];
    $fasilitas = $_POST['fasilitas'];
    $perbulan = $_POST['perbulan'];
    $per6bulan = $_POST['per6bulan'];
    $pertahun = $_POST['pertahun'];
 
        $sql = "SELECT * FROM kos WHERE nama_kost='$nama'";

        $result = mysqli_query($conn, $sql);
        //jika data tidak sama
            $sql = "UPDATE  kos SET nama_kost='$nama', admin_id_fk=$id, alamat= '$alamat', jenis='$jenis', 
            status= '$status', fasilitas= '$fasilitas', perbulan='$perbulan', 
            per6bulan='$per6bulan', pertahun='$pertahun' WHERE kos_id=$id_kos"; 
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $nama = "";
                $alamat = "";
                $jenis = "";
                $status = "";
                $fasilitas = "";
                $perbulan = "";
                $per6bulan = "";
                $pertahun = "";
                header("Location: profile_admin.php?status_update=sukses");
            } else {
                echo "<script>alert('Maaf Terjadi kesalahan.')</script>";
            }
         
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Update Kos</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Kos</p>
            <div class="input-group">
                <input type="text" placeholder="Nama Kos" name="nama" value="<?php echo $nama ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Alamat" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Jenis" name="jenis" value="<?php echo $jenis; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Status" name="status" value="<?php echo $status; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Fasilitas" name="fasilitas" value="<?php echo $fasilitas; ?>" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Harga Perbulan" name="perbulan" value="<?php echo $perbulan; ?>" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Harga Per 6 Bulan" name="per6bulan" value="<?php echo $per6bulan; ?>" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Harga Pertahun" name="pertahun" value="<?php echo $pertahun; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>