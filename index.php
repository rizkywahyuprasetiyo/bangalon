<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agen Air Galon dan Gas Elpiji - Bangalon</title>
  <link rel="stylesheet" href="assets/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(function() {
      $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
          $(".item").removeClass("active");
        } else {
          $(".item").addClass("active");
        }
      });
    });
  </script>
</head>

<body>
  <nav>
    <ul class="menu">
      <li class="logo">
        <a href=""></a><img src="gambar/logo.svg" alt="Logo" />
      </li>
      <li class="item"><a href="">Home</a></li>
      <li class="item"><a href="">About</a></li>
      <li class="item"><a href="">Kontak</a></li>
      <li class="item"><a href="login-pengguna.php">Masuk</a></li>
      <li class="item button"><a href="daftar-pengguna.php">Daftar</a></li>
      <li class="toggle"><span class="bars"></span></li>
    </ul>
  </nav>
  <main>
    <section id="hero">
      <div class="container">
        <div class="hero">
          <div class="kiri">
            <h1>PERLU AIR GALON DAN <span>GAS ELPIJI?</span></h1>
            <p>
              Kami menyediakan air galon dan gas elpiji untuk kebutuhan
              rumahan atau untuk mendukung bisnis Anda. Cukup dengan
              menghubungi kami dan barang akan langsung kami antar ke rumah
              Anda atau tempat bisnis Anda.
            </p>
            <a href="#">PESAN SEKARANG</a>
          </div>
          <div class="kanan">
            <img src="gambar/hero.png" alt="hero" width="100%" />
          </div>
        </div>
      </div>
    </section>
    <section id="produk">
      <div class="container">
        <h1 id="judul-produk">APA YANG KAMI JUAL?</h1>
        <div class="produk">
          <div class="bg">
            <div class="galon">
              <img src="gambar/galon.png" alt="galon" width="80%" />
            </div>
            <h2 id="galon">AIR GALON</h2>
            <h3 id="harga-galon">Rp. 6.000./galon</h3>
            <h3 id="stock">Tersedia</h3>
          </div>
          <div class="bg">
            <div class="gas">
              <img src="gambar/gas.png" alt="gas" width="80%" />
            </div>
            <h2 id="gas">GAS ELPIJI 3 Kg</h2>
            <h3 id="harga-gas">Rp. 22.000./tabung</h3>
            <h3 id="stock">Tersedia</h3>
          </div>
        </div>
        <div class="tombol-produk">
          <a href="#">PESAN SEKARANG</a>
        </div>
      </div>
    </section>
    <section id="langsung-antar">
      <div class="container">
        <div class="la-box">
          <div class="la-kiri">
            <h1>LANGSUNG DI ANTAR</h1>
            <p>
              Anda tidak perlu ke luar rumah, Anda cukup memesan melalui
              gadget Anda dan pesanan akan kami antar.
            </p>
            <a href="#">PESAN SEKARANG</a>
          </div>
          <div class="la-kanan">
            <img id="gambar-la-desktop" src="gambar/la.png" alt="Langsung Antar" width="250px" />
            <img id="gambar-la-mobile" src="gambar/la-mobile.png" alt="Langsung Antar" width="40%" />
          </div>
        </div>
      </div>
    </section>
    <section id="tanya">
      <div class="container">
        <div class="ctanya">
          <div class="tanya-kiri">
            <img src="gambar/headset-bg.png" alt="Tanya" width="250px" />
          </div>
          <div class="tanya-kanan">
            <h1>INGIN BERTANYA?</h1>
            <p>
              Kami bersedia melayani Anda pada jam kerja dan akan membantu
              Anda dalam menghadapi permasalahan dalam penggunakan sistem
              kami, tanya saja jangan sungkan.
            </p>
            <a class="tombol-hubungi" href="#">
              <div class="th-box">
                <img class="gambar-th" src="gambar/wa.svg" alt="Whatsapp" width="10%" />
                <h3 class="text-th">HUBUNGI KAMI</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <aside id="profile">
    <div class="container">
      <h1 id="judul-profile">DEVELOPPER</h1>
      <div class="box-profile">
        <div class="konten">
          <div class="kartu">
            <div class="gambar-profile">
              <img src="gambar/zaldi.png" alt="Profile" width="50%" />
            </div>
            <h3>Ade Zaldi Eureka Zendar</h3>
            <h6>System Analysis</h6>
          </div>
        </div>
        <div class="konten">
          <div class="kartu">
            <div class="gambar-profile">
              <img src="gambar/afif.png" alt="Profile" width="50%" />
            </div>
            <h3>Muhammad Afif Taqiyuddin</h3>
            <h6>Tester</h6>
          </div>
        </div>
        <div class="konten">
          <div class="kartu">
            <div class="gambar-profile">
              <img src="gambar/profile.png" alt="Profile" width="50%" />
            </div>
            <h3>Rizky Wahyu Prasetiyo</h3>
            <h6>Full-Stack Web Developper Developper</h6>
          </div>
        </div>
        <div class="konten">
          <div class="kartu">
            <div class="gambar-profile">
              <img src="gambar/tiara.png" alt="Profile" width="50%" />
            </div>
            <h3>Tiara Tri Anita</h3>
            <h6>Project Manager</h6>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <footer>
    <div class="konten-footer">
      &copy; 2020 | Bangalon. All Right Reserved.
    </div>
  </footer>
</body>

</html>