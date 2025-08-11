<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  require_once $baseDir."/command/db.php";
  $accessories = "SELECT * FROM produk_cache WHERE kategori = 'Aksesoris'";
  $tiktok_accessories = $dbcache->query($accessories);

  require_once $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. Aksesoris Keren/Cantik Untuk Menambah Aura Ketampanan/Kecantikan Kamu";
  $ogdesc = "Pengen tampil lebih elegan ketika keluar rumah? Yuk lihat-lihat dulu produk yang udah mimin siapin khusus untuk kamu yang pengen tampil lebih bergaya dan pastinya lebih Elegan dengan beberapa aksesoris berikut, Yukk Lihat Produk Keren/Cantik nya!!";
  $ogimg = "/assets/img/splash/Accessories.webp";
  $activePage = 'Accessories';
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
          Ini adalah halaman yang menampilkan beberapa Aksesoris pilihan, jangan sungkan untuk melihat-lihat produk disini, tenang aja semua produk yang tersedia disini pasti dengan kualitas terbaik dan tentunya dengan harga yang sangat terjangkau!!!
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Aksesoris Keren";
  $load_kategori = $tiktok_accessories;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
	</body>
</html>