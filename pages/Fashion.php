<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  require_once $baseDir."/command/db.php";
  $b_w = "SELECT * FROM produk_cache WHERE kategori = 'Baju Wanita'";
  $tiktok_b_w = $dbcache->query($b_w);
  $c_w = "SELECT * FROM produk_cache WHERE kategori = 'Celana Wanita'";
  $tiktok_c_w = $dbcache->query($c_w);
  $b_p = "SELECT * FROM produk_cache WHERE kategori = 'Baju'";
  $tiktok_b_p = $dbcache->query($b_p);
  $c_p = "SELECT * FROM produk_cache WHERE kategori = 'Celana'";
  $tiktok_c_p = $dbcache->query($c_p);

  require_once $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. Fashion Stylish Buat Pria dan Wanita Yang Selalu Tampil Modis Ketika Bepergian";
  $ogdesc = "Pakaian Berkualitas dengan motif Keren dan Cantik disini sangat cocok untuk menambah Aura Ketampanan dan Kecantikan Kalian, Yukk dilihat-lihat dulu, kalo suka langsung checkout aja Yaaa😁";
  $ogimg = "/assets/img/splash/Fashion.webp";
  $activePage = 'Fashion';
  $ogurl = categoryURL($activePage);
  $ogtype = "website";
  require_once $baseDir . '/partials/head.php';
?>
  <body>
<?php
  require_once $baseDir . '/partials/header.php';
;?>
    <main>
      <!-- Sambutan -->
      <section aria-labelledby="sambutan" class="sambutan">
        <header>
          <h1 id="sambutan">Selamat Datang di ZHStore.</h1>
        </header>
        <p>
          Selamat mencari produk Fashion yang sesuai dengan minat Anda disini, tenang aja semua produk yang tersedia disini pasti dengan kualitas terbaik dengan harga yang sangat terjangkau!!!
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Baju Wanita";
  $load_kategori = $tiktok_b_w;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Baju Pria";
  $load_kategori = $tiktok_b_p;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Celana Wanita";
  $load_kategori = $tiktok_c_w;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Celana Pria";
  $load_kategori = $tiktok_c_p;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
	</body>
</html>