<?php
include 'koneksi.php';
$id = $_GET['id'];

$konfir = mysqli_query($conn, "UPDATE `pesanan` SET `status` = 'SEDANG DI PROSES' WHERE `no_transaksi` = $id");
if ($konfir > 0) {
    echo '<script>alert("Pesanan telah konfirmasi!"); document.location.href="dashboard-admin.php";</script>';
    exit;
} else {
    echo '<script>alert("Pesanan gagal konfirmasi!"); document.location.href="dashboard-admin.php";</script>';
    exit;
}
