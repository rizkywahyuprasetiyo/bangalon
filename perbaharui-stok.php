<?php
include 'koneksi.php';
echo $id = $_GET['id'];
echo $harga = $_POST['harga'];
exit;
$qubah = mysqli_query($conn, "UPDATE `stok` SET `harga` = '$harga' WHERE `id_stock` = $id");
if ($qubah > 0) {
    echo '<script>alert("Harga berhasil di perbaharui!"); document.location.href="dashboard-admin.php";</script>';
    exit;
} else {
    echo '<script>alert("Harga gagal di perbaharui!"); document.location.href="dashboard-admin.php";</script>';
    exit;
}
