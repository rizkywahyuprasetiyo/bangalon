<?php
include 'koneksi.php';
$ambil = mysqli_query($conn, "SELECT pesanan.no_transaksi, user.nama, pesanan.alamat, pesanan.nama_barang, pesanan.jumlah, pesanan.status, pesanan.harga, user.nomorwa FROM pesanan INNER JOIN user ON pesanan.id = user.id;");

$jumlah_pesanan = mysqli_query($conn, "SELECT COUNT(id_trans) as hasil FROM pesanan");
$cetak_jumlah_pesanan = mysqli_fetch_assoc($jumlah_pesanan);

$jumlah_pengguna = mysqli_query($conn, "SELECT COUNT(id) as hasil FROM user");
$cetak_jumlah_pengguna = mysqli_fetch_assoc($jumlah_pengguna);

$jumlah_kurir = mysqli_query($conn, "SELECT COUNT(id) as hasil FROM kurir");
$cetak_jumlah_kurir = mysqli_fetch_assoc($jumlah_kurir);

$stok = mysqli_query($conn, "SELECT * FROM `stok`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard Admin</title>
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('sidebar-admin.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php include('komponen-admin.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pesanan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cetak_jumlah_pesanan['hasil']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cetak_jumlah_pengguna['hasil']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kurir</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $cetak_jumlah_pengguna['hasil']; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-truck fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Manajemen Stok</h1>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Stok Barang
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($rowin = mysqli_fetch_assoc($stok)) :
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $rowin['nama_barang']; ?></td>
                        <td><?= $rowin['harga']; ?></td>
                        <td><span class="badge badge-info"><?= $rowin['status']; ?></span></td>
                        <td><a class="btn btn-primary mr-1 mb-1 btn-sm" href="konfirmasi-pesanan.php?id=<?= $row['no_transaksi']; ?>" role="button"><i class="fas fa-check"></i> Konfirmasi</a><a class="btn btn-success mr-1 mb-1 btn-sm" href="https://api.whatsapp.com/send?phone=<?= $row['nomorwa']; ?>&text=Permisi,%20apakah%20benar%20ini%20dengan%20<?= $row['nama']; ?>?%20Kami%20dari%20bangalon%20ingin%20mengantarkan%20pesanan.%20Terima%20Kasih." role="button"><i class="fab fa-whatsapp"></i> Hubungi</a><a class="btn btn-warning mr-1 mb-1 btn-sm" href="hapus-pesanan.php?id=<?= $row['no_transaksi']; ?>" role="button"><i class="fas fa-trash"></i> Hapus</a></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Tabel Pesanan</h1>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Tabel Pesanan
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Nama Barang</th>
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
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($ambil)) :
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['no_transaksi']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td><span class="badge badge-info"><?= $row['status']; ?></span></td>
                        <td><a class="btn btn-primary mr-1 mb-1 btn-sm" href="konfirmasi-pesanan.php?id=<?= $row['no_transaksi']; ?>" role="button"><i class="fas fa-check"></i> Konfirmasi</a><a class="btn btn-success mr-1 mb-1 btn-sm" href="https://api.whatsapp.com/send?phone=<?= $row['nomorwa']; ?>&text=Permisi,%20apakah%20benar%20ini%20dengan%20<?= $row['nama']; ?>?%20Kami%20dari%20bangalon%20ingin%20mengantarkan%20pesanan.%20Terima%20Kasih." role="button"><i class="fab fa-whatsapp"></i> Hubungi</a><a class="btn btn-warning mr-1 mb-1 btn-sm" href="hapus-pesanan.php?id=<?= $row['no_transaksi']; ?>" role="button"><i class="fas fa-trash"></i> Hapus</a></td>
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

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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