<?php
include 'koneksi.php';
$id = $_GET['id'];

$hapus_pesanan = mysqli_query($conn, "DELETE FROM `pesanan` WHERE no_transaksi = $id");
if ($hapus_pesanan > 0) {
    echo '<script>alert("Pesanan berhasil di hapus!"); document.location.href="dashboard-admin.php";</script>';
    exit;
} else {
    echo '<script>alert("Pesanan gagal di hapus!"); document.location.href="dashboard-admin.php";</script>';
    exit;
}
