<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  include $baseDir."/command/db.php";
  $leather = "SELECT * FROM produk_cache WHERE kategori = 'Leather'";
  $tiktok_leather = $dbcache->query($leather);

  include $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  $ogtitle = "ZHStore. Temukan Produk Kulit Berkualitas Premium Dengan Harga Terjangkau.";
  $ogdesc = "Pecinta Vintage pasti suka dengan produk yang ada disini!! Berbagai pilihan Produk Kulit Berkualitas Premium yang pengerjaannya Handmade agar kualitas tetap terjaga dan hasil akhir tetap rapi agar nyaman dipandang, tunggu apa lagi?! Buruan order sekarang!!!";
  $ogimg = "/assets/img/splash/Leather.webp";
  $ogurl = "https://store.zhwifi.web.id/pages/Leather.php";
  $ogtype = "website";
  include $baseDir . '/partials/head.php';
?>
  <body>
<?php
  $activePage = 'Leather';
  include $baseDir . '/partials/header.php';
;?>
    <main>
      <!-- Sambutan -->
      <section aria-labelledby="sambutan" class="sambutan">
        <header>
          <h1 id="sambutan">Selamat Datang di ZHStore.</h1>
        </header>
        <p>
          Kabar gembira untuk para pecinta Vintage, disini tersedia berbagai macam pilihan produk Kulit Sapi Berkualitas Tinggi dengan harga terjangkau. Jangan ragu untuk membeli karena semua produk disini pasti telah melakukan quality control yang sangat ketat demi kenyamanan pelanggan 🫡😊.
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Produk Kulit Keren";
  $load_kategori = $tiktok_leather;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php include $baseDir.'/partials/footer.php';?>
  </body>
</html>