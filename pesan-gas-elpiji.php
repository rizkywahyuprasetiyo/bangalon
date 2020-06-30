<?php
include 'koneksi.php';
$id = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = $id");
$bongkar = mysqli_fetch_assoc($ambil);

$ambil_harga = mysqli_query($conn, "SELECT * FROM `stok` WHERE `id_stok` = 2");
$gas = mysqli_fetch_assoc($ambil_harga);
$harga = $gas['harga'];

if (isset($_POST['kirim'])) {
  $id = $bongkar['id'];
  $jumlah = $_POST['jumlah'];
  $alamat_lain = $_POST['alamat'];
  $waktu = date("Y/m/d h:i:sa");

  $total = $jumlah * $harga;

  $no_transaksi = rand(1000, 9999);
  $cek_no_trans = mysqli_query($conn, "SELECT * FROM `pesanan` WHERE `no_transaksi` = $no_transaksi");
  if ($cek_no_trans === 1) {
    $no_transaksi_kirim = rand(1000, 9999);
  } else {
    $no_transaksi_kirim = $no_transaksi;
  }

  if ($_POST['rb_alamat'] == "alamat-sekarang") {
    $alamat_kirim = $bongkar['alamat'];
  } else if ($_POST['rb_alamat'] == "alamat-lain") {
    $alamat_kirim = $alamat_lain;
  }

  $hasil = mysqli_query($conn, "INSERT INTO `pesanan`(`id_trans`, `id`, `waktu`, `no_transaksi`, `nama_barang`, `alamat`, `jumlah`, `harga`, `status`) VALUES (NULL,'$id','$waktu','$no_transaksi_kirim','Gas Elpiji','$alamat_kirim','$jumlah','$total','DIPESAN')");
  if ($hasil > 0) {
    echo "<script>alert('Pesanan telah diajukan!'); document.location.href='dashboard-pengguna.php';</script>";
    exit;
  } else {
    echo "<script>alert('Mohon maaf pesanan Anda gagal di ajukan!'); document.location.href='';</script>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pesan Gas Elpiji - Bangalon</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Pesan Gas Elpiji</h1>
              </div>
              <form class="user" action="" method="post">
                <div class="form-group">
                  <input type="number" name="jumlah" class="form-control form-control-user" id="exampleInputText" placeholder="Jumlah Pesanan" required>
                </div>
                <label class="text-sm ml-2">Diantar di Alamat mana?</label>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="radio" name="rb_alamat" id="exampleRadios1" value="alamat-sekarang">
                  <label class="form-check-label" for="exampleRadios1">
                    Alamat Saya
                  </label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input pl-2" type="radio" name="rb_alamat" id="exampleRadios2" value="alamat-lain">
                  <label class="form-check-label" for="exampleRadios2">
                    Alamat Lain
                  </label>
                </div>
                <div class="form-group mt-2">
                  <textarea class="form-control border-daftar" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Rumah"></textarea>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="kirim">
                  Pesan Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>