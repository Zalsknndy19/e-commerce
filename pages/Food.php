<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  require_once $baseDir."/command/db.php";
  $F_makanan = "SELECT * FROM produk_cache WHERE kategori = 'Makanan'";
  $tiktok_F_makanan = $dbcache->query($F_makanan);
  $F_minuman = "SELECT * FROM produk_cache WHERE kategori = 'Minuman'";
  $tiktok_F_minuman = $dbcache->query($F_minuman);

  require_once $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. Berbagai Cemilan dan Minuman Untuk Menemani Hari-harimu";
  $ogdesc = "Suka Nobar tapi gak ada cemilan sama minuman? Ahh cemen banget sih, gak seru lho nonton kalo gak sambil ngemil, rasanya kayak kamu ngejar-ngejar dia tapi dia malah lari ngejar orang lain :v :), Yuk lihat-lihat disini.";
  $ogimg = "/assets/img/splash/Food.webp";
  $activePage = 'Food';
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
          Lagi nyari cemilan buat rencana nonton dirumah? Nyetok produk ini aja!!! Rasanya seperti Anda menjadi Iron Man😁.
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Cemilan Niqmat";
  $load_kategori = $tiktok_F_makanan;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Pelepas Dahaga";
  $load_kategori = $tiktok_F_minuman;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
	</body>
</html>