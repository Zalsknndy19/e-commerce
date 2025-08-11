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
  $ogtitle = "title";
  $ogdesc = "description";
  $ogimg = "/assets/img/splash/image.png";
  $activePage = 'Template';
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
          Teks1
        </p>
        <p>
          Teks2
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Judul";
  $load_kategori = $tiktok_accessories;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>



<?php require_once $baseDir.'/partials/footer.php';?>
  </body>
</html>