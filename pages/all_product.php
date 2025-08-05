<?php
  $baseDir = realpath(__DIR__."/../");
  include $baseDir."/command/db.php";
  $all = "SELECT * FROM produk_cache ORDER BY kategori ASC";
  $tiktok_all = $dbcache->query($all);

  include $baseDir.'/partials/func/functions.php'
?>
<!DOCTYPE html>
<html>
<?php
  $ogtitle = "ZHStore. Tampilan Semua Produk";
  $ogdesc = "Tampilan Semua Produk Yang Ada di Database";
  $ogimg = "/assets/img/splash/splash_meta.png";
  $ogurl = "https://store.zhwifi.web.id/pages/all_product.php";
  $ogtype = "website";
  include $baseDir . '/partials/head.php';
?>

  <body>
<?php
  $activePage = 'Beranda';
  include $baseDir . '/partials/header.php';
;?>
    <main>
      <!-- Sambutan -->
      <section aria-labelledby="sambutan" class="sambutan">
        <header>
          <h1 id="sambutan">Selamat Datang di ZHStore.</h1>
        </header>
        <p>
          Dipilih Dipilih Dipilih, mariiiii!!!!
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Product Section -->
      <section>
        <h2 class="judul-kategori">All Product</h2>
        <div class="product-grid">
<?php
  while ($prod_tiktok = $tiktok_all->fetchArray(SQLITE3_ASSOC)){
    include $baseDir.'/partials/func/var.php';
?>
          <div class="card-new">
            <div class="badge"><?php echo $prod_tiktok["custom_badge"];?></div>
            <div class="tilt">
              <div class="img">
                <img class="badgeaff" src="<?php echo $prod_tiktok["favicon"];?>">
                <img src="<?php echo $prod_tiktok["image"];?>" alt="<?php echo "Foto " . $title_cut;?>">
              </div>
            </div>
            <div class="info">
              <div class="cat"><?php echo $prod_tiktok["kategori"];?></div>
              <h2 class="title"><?php echo $title_fix;?></h2>
              <p class="desc"><?php echo $desc_cut;?></p>
              <div class="feats">
                <span class="feat">Murah</span>
                <span class="feat">Berkualitas</span>
                <span class="feat" hidden>Thunderbolt 4</span>
              </div>
              <div class="bottom">
                <div class="price">
<?php if ($prod_tiktok["harga_old"] !=0):?>
                  <span class="old"><?php echo  $harga_old;?></span>
<?php endif; ?>
                  <span class="new"><?php echo $harga_new;?></span>
                </div>
                <button class="btn">
                  <a href="/pages/aff_tiktok.php?kode=<?php echo $prod_tiktok["id"];?>" target="_blank">Cek Disini <i class="fa-solid fa-bag-shopping"></i></a>
                </button>
              </div>
              <div class="meta">
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <span class="rcount"><?php echo $rating." (".$jumlah_review;?> Reviews)</span>
                </div>
                <div class="stock">Tersedia</div>
              </div>
            </div>
          </div>
<?php }?>
        </div>
      </section>
      <!-- End Product Section -->
    </main>

<?php include $baseDir.'/partials/footer.php';?>
  </body>
</html>
