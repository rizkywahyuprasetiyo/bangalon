<?php
include 'koneksi.php';
$id = $_GET['id'];
$hapus = mysqli_query($conn, "DELETE FROM `distribusi` WHERE `id_antar` = $id");
if ($hapus > 0) {
    echo "<script>alert('Data distribusi barang berhasil di hapus'); document.location.href='admin-distribusi.php';</script>";
    exit;
} else {
    echo "<script>alert('Data distribusi barang gagal di hapus'); document.location.href='admin-distribusi.php';</script>";
    exit;
}
