<?php
include 'koneksi.php';

$id = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$id'");
$row = mysqli_fetch_assoc($ambil);

if(isset($_POST['register'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password1'];
  $password2 = $_POST['password2'];
  $passwordlama = $row['password'];

  if($password == ""){
    $passwordkirim = $passwordlama;
  }else{
    $passwordkirim = $password;
  }

  $temp = mysqli_query($conn, "UPDATE `admin` SET `email` = 'NULL' WHERE `id` = $id");
  $cek_email = mysqli_query($conn, "SELECT * FROM `admin` WHERE `email` = '$email'");
  if(mysqli_fetch_assoc($cek_email)){
    echo "<script>alert('Email sudah terdaftar!');</script>";
    return false;
  }
  
  if($password !== $password2){
    echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
    return false;
  }
  

  $hasil = mysqli_query($conn, "UPDATE `admin` SET `nama`='$nama', `email`='$email', `password`='$passwordkirim' WHERE `id` = $id");
	if (mysqli_affected_rows($conn) > 0){
		echo "<script>alert('Akun berhasil di perbaharui!'); document.location.href='akun-admin.php';</script>";
		exit;
	}else{
		echo "<script>alert('Akun gagal di perbaharui!'); document.location.href='';</script>";
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
                <h1 class="h4 text-gray-900 mb-4">Buat akun Anda</h1>
              </div>
              <form class="user" action="" method="post">
              <input type="hidden" name="passwordlama" value="<?php $row['password']; ?>">
              <div class="form-group">
                  <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control form-control-user" id="exampleInputText" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ubah Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="register">
                  Buat Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Suda punya akun? Silahkan masuk.</a>
              </div>
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
