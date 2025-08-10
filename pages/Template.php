<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  include $baseDir."/command/db.php";
  $accessories = "SELECT * FROM produk_cache WHERE kategori = 'Aksesoris'";
  $tiktok_accessories = $dbcache->query($accessories);

  include $baseDir.'/partials/func/functions.php'
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
  include $baseDir . '/partials/head.php';
?>
  <body>
<?php
  include $baseDir . '/partials/header.php';
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



<?php include $baseDir.'/partials/footer.php';?>
  </body>
</html>