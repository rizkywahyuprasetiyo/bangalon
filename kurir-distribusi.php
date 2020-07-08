<?php
session_start();
include 'koneksi.php';
$id = $_SESSION['id'];
$cek = mysqli_query($conn, "SELECT * FROM `kurir` WHERE `id` = $id");
$row = mysqli_fetch_assoc($cek);

$ambil_base = mysqli_query($conn, "SELECT pesanan.no_transaksi, pesanan.nama_barang, pesanan.jumlah, pesanan.harga, pesanan.status, user.alamat, user.nama FROM distribusi INNER JOIN pesanan ON distribusi.id_trans = pesanan.id_trans INNER JOIN user ON pesanan.id = user.id WHERE distribusi.id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard Kurir</title>
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('sidebar-kurir.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php include('komponen-kurir.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Data Distribusi Barang</h1>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Distribusi Barang
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama Pembeli</th>
                      <th>Nama Barang</th>
                      <th>Alamat</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama Pembeli</th>
                      <th>Nama Barang</th>
                      <th>Alamat</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($rowin = mysqli_fetch_assoc($ambil_base)) :
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $rowin['no_transaksi']; ?></td>
                        <td><?= $rowin['nama']; ?></td>
                        <td><?= $rowin['nama_barang']; ?></td>
                        <td><?= $rowin['alamat']; ?></td>
                        <td><?= $rowin['jumlah']; ?></td>
                        <td><?= $rowin['harga']; ?></td>
                        <td><span class="badge badge-info"><?= $rowin['status']; ?></span></td>
                        <td><a class="btn btn-info mr-1 mb-1 btn-sm" href="selesai-antar.php?id=<?= $rowin['no_transaksi']; ?>" role="button"><i class="fas fa-check"></i> selesai</a></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <?php include 'footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika Anda meninginkan untuk keluar dari sistem, Anda bisa masuk kembali nanti.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="keluar.php">Keluar</a>
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

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>