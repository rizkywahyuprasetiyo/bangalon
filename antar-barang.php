<?php
include 'koneksi.php';

$no_transaksi = $_GET['id'];
$id_kurir =  $_GET['kurir'];
$waktu = date("Y/m/d h:i:sa");

$cek_status = mysqli_query($conn, "SELECT * FROM `pesanan` WHERE `id_trans` = $no_transaksi");
$ambil_status = mysqli_fetch_assoc($cek_status);
if ($ambil_status['status'] === 'DALAM PERJALANAN') {
    echo "<script>alert('Pesanan telah di ambil, silahkan ambil pesanan yang lain'); document.location.href='dashboard-kurir.php';</script>";
    exit;
}

mysqli_query($conn, "UPDATE `pesanan` SET `status` = 'DALAM PERJALANAN' WHERE `id_trans` = $no_transaksi");

$antar = mysqli_query($conn, "INSERT INTO `distribusi`(`id_antar`, `id_trans`, `id`, `waktu_distribusi`) VALUES (NULL,'$no_transaksi','$id_kurir','$waktu')");
if ($antar > 0) {
    echo "<script>alert('Anda telah mengambil pesanan untuk di antar. Cek distribusi barang'); document.location.href='dashboard-kurir.php';</script>";
    exit;
} else {
    echo "<script>alert('Mohon maaf pesanan gagal di ambil'); document.location.href='dashboard-kurir';</script>";
    exit;
}
