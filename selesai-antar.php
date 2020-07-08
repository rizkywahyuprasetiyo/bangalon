<?php
include 'koneksi.php';
$id = $_GET['id'];

$cek_status = mysqli_query($conn, "SELECT * FROM `pesanan` WHERE `no_transaksi` = $id");
$ambil_status = mysqli_fetch_assoc($cek_status);
if ($ambil_status['status'] === 'TELAH SAMPAI') {
    echo '<script>alert("Tugas ini telah di selesaikan!"); document.location.href="kurir-distribusi.php";</script>';
    exit;
}

$update = mysqli_query($conn, "UPDATE `pesanan` SET `status` = 'TELAH SAMPAI' WHERE `no_transaksi` = $id");
if ($update > 0) {
    echo '<script>alert("Barang telah di selesaikan!"); document.location.href="kurir-distribusi.php";</script>';
    exit;
} else {
    echo '<script>alert("Mohon maaf, ada kesalahan dalam menyelesaikan distribusi barang"); document.location.href="kurir-distribusi.php";</script>';
    exit;
}
