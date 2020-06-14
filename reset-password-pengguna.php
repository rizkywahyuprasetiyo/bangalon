<?php
include 'koneksi.php';

$id = $_GET['id'];

$reset = mysqli_query($conn, "UPDATE `user` SET `password` = '123' WHERE `id` = $id");
if($reset > 0){
    echo "<script>alert('Password berhasil di reset!'); document.location.href='akun-pengguna.php';</script>";
    exit;
}else{
    echo "<script>alert('Password gagal di reset!'); document.location.href='akun-pengguna.php';</script>";
    exit;
}

?>