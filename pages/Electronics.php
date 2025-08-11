<?php
$baseDir = __DIR__.'/../';
require_once $baseDir."/command/db.php";
$elc_gadget = "SELECT * FROM produk_cache WHERE kategori = 'Gadget'";
$tiktok_elc_gadget = $dbcache->query($elc_gadget);
$elc_electronic = "SELECT * FROM produk_cache WHERE kategori = 'Elektronik'";
$tiktok_elc_electronic = $dbcache->query($elc_electronic);
$elc_charger = "SELECT * FROM produk_cache WHERE kategori = 'Charger'";
$tiktok_elc_charger = $dbcache->query($elc_charger);

require_once $baseDir.'/partials/func/functions.php';
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. Nyari Rekomendasi Barang Elektronik Untuk Kebutuhan Sehari-hari? Disini Aja Nyarinya Udah Dipilihin Sama Mimin😁";
  $ogdesc = "Nyari Speaker buat Karaoke? Nyari Lampu buat NGELIVE? Atau lagi nyari TWS buat dengerin musik sambil nyantai? Wihhh disini disediain banyak lho, kamu tinggal pilih aja Produk yang mau kamu beli, tenang aja kualitasnya terjamin kok☺️, Yukk buruan Checkidot!!!";
  $ogimg = "/assets/img/splash/Electronics.webp";
  $activePage = 'Electronics';
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
          Lagi nyari Gadget Elektronik terbaik? ZHStore solusinya!!! Tenang aja semua produk yang tersedia disini pasti dengan kualitas terbaik dengan harga yang sangat terjangkau!!!
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Gadgets";
  $load_kategori = $tiktok_elc_gadget;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Elektronik";
  $load_kategori = $tiktok_elc_electronic;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
      
      <!-- Product Section -->
<?php
  $judul_kategori = "Charger Premium";
  $load_kategori = $tiktok_elc_charger;
  include $baseDir."/partials/produk.php"
?>
      <!-- End Product Section -->
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
	</body>
</html>