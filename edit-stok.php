<?php
include 'koneksi.php';

$id = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM `stok` WHERE `id_stok` = '$id'");
$row = mysqli_fetch_assoc($ambil);

if (isset($_POST['edit'])) {
  $harga = $_POST['harga'];
  $status = $_POST['status'];

  $hasil = mysqli_query($conn, "UPDATE `stok` SET `harga`='$harga', `status`='$status' WHERE `id_stok` = $id");
  if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Stok berhasil di perbaharui!'); document.location.href='dashboard-admin.php';</script>";
    exit;
  } else {
    echo "<script>alert('Stok gagal di perbaharui!'); document.location.href='';</script>";
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

  <title>Register - Bangalon</title>

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
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Informasi <?= $row['nama_barang']; ?></h1>
              </div>
              <form class="user" action="" method="post">
                <input type="hidden" name="passwordlama" value="<?php $row['password']; ?>">
                <div class="form-group">
                  <label for="harga" class="small ml-2">Harga</label>
                  <input type="text" name="harga" value="<?php echo $row['harga']; ?>" class="form-control form-control-user" id="exampleInputText" placeholder="<?= $row['harga']; ?>">
                </div>
                <div class="form-group">
                  <label for="harga" class="small ml-2">Status</label>
                  <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="<?= $row['status']; ?>">
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="edit">
                  Perbaharui
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