<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  require_once $baseDir."/command/db.php";
  $sabun = "SELECT * FROM produk_cache WHERE kategori = 'Sabun'";
  $tiktok_sabun = $dbcache->query($sabun);

  require_once $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. Find your favorite items here";
  $ogdesc = "Promo menarik dengan barang berkualitas!!!, cuma di ZHStore. Yuk cek sekarang!";
  $ogimg = "/assets/img/splash/Other.webp";
  $activePage = 'Other';
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
        <p>Halaman ini belum terlalu diurus karena admin lagi sibuk di dunia nyata
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Cuci Gudang";
  $load_kategori = $tiktok_sabun;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
  </body>
</html>