<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM admin WHERE nama='$nama' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        //cek session
        $_SESSION['nama'] =$row['nama'];
        $_SESSION['admin_id'] = $row['admin_id'];
        header("Location: home_admin.php");
    } elseif(!($result->num_rows > 0)) {
        $sql = "SELECT * FROM user WHERE nama='$nama' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            header("Location: home_user.php");
        } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
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
    <title>Kos-Kosan</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="pilihan.php">Register</a></p>
        </form>
    </div>

<!-- sukses register -->
<?php if(isset($_GET['status_register'])): ?>
		<?php
			if($_GET['status_register'] == 'sukses'){
        echo "<script>alert('Selamat, registrasi berhasil!')</script>";
			} else {
				echo "<script>alert('Maaf Terjadi kesalahan.')</script>";
			}
		?>
	<?php endif; ?>
<!-- akhir sukser -->
</body>
</html>