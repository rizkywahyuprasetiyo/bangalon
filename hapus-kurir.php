<?php
include 'koneksi.php';

$id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM `kurir` WHERE id = $id");

if ($q == 1) {
    echo "<script>alert('Data berhasil di hapus'); document.location.href='akun-kurir.php';</script>";
    exit;
} else {
    echo "<script>alert('Data gagal di hapus'); document.location.href='akun-kurir.php';</script>";
    exit;
}

?>