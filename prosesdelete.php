<?php
 include 'config.php';
 session_start();

 if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}

if( isset($_GET['kos_id']) ) {

    $id = $_GET['kos_id'];

    $query = mysqli_query($conn, "DELETE FROM kos WHERE kos_id=$id");

    if($query) {
        header('location: profile_admin.php?status=sukses');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("gagal menghapus...");
}
?>