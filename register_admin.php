<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $nama= $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telephon = $_POST['no_telephon'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM admin WHERE nama='$nama'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO admin (nama, jenis_kelamin, no_telephon, password)
                    VALUES ('$nama', '$jenis_kelamin', '$no_telephon', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nama = "";
                $jenis_kelamin = "";
                $no_telephon = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("Location: index.php?status_register=sukses");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! nama Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Kosan Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Pemilik Kos</p>
            <div class="input-group">
                <input type="text" placeholder="Username" autocomplete="off" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Jenis Kelamin"  autocomplete="off" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="No Telephon"  autocomplete="off" name="no_telephon" value="<?php echo $no_telephon; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password"  autocomplete="off" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password"  autocomplete="off" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>
    </div>
</body>
</html>