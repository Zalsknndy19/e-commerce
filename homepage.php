<?php
  require_once "./command/db.php";
  $category = "SELECT * FROM kategori_splash ORDER BY kateg ASC";
  $affiliate = "SELECT * FROM produk_cache";
  $categ = $dbcache->query($category);
  $tiktok = $dbcache->query($affiliate);
  require_once "./partials/func/functions.php";
?>
<!DOCTYPE html>
<html>
<?php 
  $ogtitle = "ZHStore. Temukan Produk Favoritmu Disini!!!";
  $ogdesc = "Promo menarik dengan barang berkualitas!!!, cuma di ZHStore. Yuk cek sekarang!";
  $ogimg = "/assets/img/splash/splash_meta.png";
  $ogurl = "https://store.zhwifi.web.id";
  $ogtype = "website";

  require_once "./partials/head.php";
?>
  <body>
<?php
  $activePage = 'Beranda';
  require_once "./partials/header.php"
;?>
    <main>
      <!-- Sambutan -->
      <section aria-labelledby="sambutan" class="sambutan">
        <header>
          <h1 id="sambutan">Selamat Datang di ZHStore</h1>
        </header>
        <p>
          Temukan beragam produk pilihan, dari kebutuhan sehari-hari hingga barang unik yang sulit ditemukan di tempat lain.
          Semua produk kami terkurasi khusus dengan harga terbaik, dan siap dikirim langsung ke rumah Anda.
        </p>
        <p>
          Jelajahi koleksi kami sekarang dan nikmati pengalaman belanja yang praktis, cepat, dan terpercaya!
        </p>
        <a href="#highlight" class="ctasambut">Yukk Lihat-Lihat Dulu</a>
      </section>
      <!-- / Sambutan -->
      
      <!-- Shop Section -->
      <section class="category-grid">
<?php while ($rowcateg = $categ->fetchArray(SQLITE3_ASSOC)) { ?>
        <div class="categ-card">
          <img loading="lazy" src="/assets/img/splash/<?php echo $rowcateg['kateg'];?>.webp" onerror="this.onerror=null; this.src='img/default.webp';" alt="Foto <?php echo $rowcateg['kateg'];?>">
          <div class="categ-label">
            <span class="categ-title"><?php echo $rowcateg['kateg'];?></span>
            <a href="<?php echo categoryURL($rowcateg["kateg"]);?>" class="categ-btn">Lihat Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
<?php }?>
      </section>
      <!-- End Shop Section -->
      
      <!-- Produk -->
      <section class="prod-tabs">
        <h2 id="highlight">Highlight Semua Produk</h2>
        <div id="tab1" class="tab-pane active">
          <div class="prod-slick" data-nav="#slick-nav-1">
<?php
  while ($prod_tiktok = $tiktok->fetchArray(SQLITE3_ASSOC)) {
    require_once './partials/func/var.php';
?>
            <div class="card-new" style="margin-left:5px;">
              <div class="badge"><?php echo $prod_tiktok["custom_badge"];?></div>
              <div class="tilt">
                <div class="img"><img loading="lazy" class="badgeaff" src="<?php echo $prod_tiktok["favicon"];?>"><img loading="lazy" src="<?php echo $prod_tiktok["image"];?>" alt="<?php echo "Foto " . $title_cut;?>"></div>
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
                  <a class="btn" href="<?php echo aff_tiktokDetailURL($prod_tiktok["id"]);?>">Cek Disini <i class="fa-solid fa-bag-shopping"></i></a>
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
          <div id="slick-nav-1" class="prod-slick-nav"></div>
        </div>
      </section>
      <!-- / Produk -->
      <section class="hero-slide" style="display:none;">
        <div class="slider" hidden>
          <div class="banner-promo">
            <img loading="lazy" src="/assets/img/banner/fashionpromo.png" alt="produk1">
            <h3 class="title-promo">Promo Fashion Diskon 30%</h3>
            <p class="desc-promo">Fashion dari beberapa Brand ternama lagi ngadain diskon nih, Yuk Intip!!!</p>
            <button class="cta"><a href="Fashion.php">Intip <i class="fa fa-eye"></i></a></button>
          </div>
        </div>
        <div class="slider">
          <div class="banner-promo">
            <img loading="lazy" src="/assets/img/banner/seblak.png" alt="produk2">
            <h3 class="title-promo">Spicy Food</h3>
            <p class="desc-promo">Lagi pusing kepala gara-gara banyak pikiran? Coba makan ini aja dijamin pening kepala langsung minggaaaaattt!!!</p>
            <button class="cta"><a href="Food.php"><i class="fa-solid fa-fire"></i>🔥 🥵<i class="fa-solid fa-pepper-hot"></i></a></button>
          </div>
        </div>
        <div class="slider">
          <div class="banner-promo">
            <img loading="lazy" src="/assets/img/banner/aksesoris.png" alt="produk3">
            <h3 class="title-promo">Beautiful Jewelry</h3>
            <p class="desc-promo">Buat Kakak-kakak Cantik yang lagi nyari aksesoris Cuantik, Minimalis dan Fashionable, disini ada banyak lho, Murah Bangeeeett!!!</p>
            <button class="cta"><a href="Accessories.php">Mari <i class="fa fa-arrow-circle-right"></i></a></button>
          </div>
        </div>
      </section>
    </main>
    

<?php require_once "./partials/footer.php";?>
  </body>
</html>