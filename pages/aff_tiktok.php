<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  require_once $baseDir."/command/db.php";
  $no = 1;
  $id = $_GET['kode'];
  $product = "SELECT * FROM produk_cache WHERE id = $id";
  
  $tiktok = $dbcache->query($product);
  
  require_once $baseDir.'/partials/func/functions.php';
  while($prod_tiktok = $tiktok->fetchArray(SQLITE3_ASSOC)){
    include $baseDir.'/partials/func/var.php';
    $kategori = $prod_tiktok['kategori'];
    $id_kategori = strtolower(str_replace(' ', '-', $prod_tiktok['kategori'])); // ganti spasi jadi -
?>
<!DOCTYPE html>
<html>
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $product_description = $prod_tiktok['description'] ?? '';
  $ogtitle = "ZHStore. " . $prod_tiktok['title'];
  $ogdesc = "Promo menarik! ".potong_title($prod_tiktok['title'], 20)." berkualitas, cuma di ZHStore. Yuk cek sekarang!";
  $ogimg = $prod_tiktok['image'];
  $ogurl = aff_tiktokDetailURL($id);
  $ogtype = "product";
  $text = 'Lihat produk ini di ZHStore! ' . $ogurl;
  $is_product_page = true;
  require_once $baseDir . '/partials/head.php';
?>
  <body>
<?php
  $activePage = $prod_tiktok['main_kategori'];
  require_once $baseDir . '/partials/header.php';
;?>
    <main>
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb" id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb-tree">
                <li><a href="/">Beranda</a></li>
                <li><a href="<?php echo categoryURL($prod_tiktok['main_kategori']);?>"><?php echo $prod_tiktok['main_kategori'] ;?></a></li>
                <li><a href="<?php echo categoryURL($prod_tiktok['main_kategori']);?>#<?php echo $id_kategori;?>"><?php echo $prod_tiktok['kategori'];?></a></li>
                <li class="active" aria-current="page"><?php echo substr($title_fix,0,10)."...";?></li>
              </ul>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </nav>
      <!-- /BREADCRUMB -->
      <h1>Halaman Detail Produk</h1><br>
      <!-- PRODUCT DETAIL -->
      <section class="prod-cont">
        <!-- THUMB IMAGES -->
        <div id="prod-imgs">
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image1'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image2'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
        </div>
        
        <!-- MAIN IMAGES -->
        <div id="prod-main-img">
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image1'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
          <div class="prod-preview"><img loading="lazy" src="<?php echo $prod_tiktok['image2'];?>" alt="Foto <?php echo $prod_tiktok_name;?>"></div>
        </div><br>
        
        <!-- DETAILS -->
        <div class="prod-details">
          <h2 class="prod-name"><?php echo $prod_tiktok["title"];?></h2>
          <div class="prod-rating">
            &nbsp;&nbsp;&emsp;<i class="fa-solid fa-star"></i>
            <span class="rcount"><?php echo $rating." (".$jumlah_review;?> Reviews)</span>
          </div>
          <div>
            <h3 class="prod-price">
              <?php echo $harga_new;?>
              <?php if ($prod_tiktok["harga_old"] !=0):?>
              <del class="prod-old-price"><?php echo  $harga_old;?></del>
<?php endif;?>
            </h3>
            <span class="prod-available">Produk Tersedia</span>
          </div>
          <div class="desc-cont">
            <p class="description"><strong>Deskripsi Produk:</strong><br><br><?php echo $prod_tiktok['description'];?></p>
          </div>
        
          <ul class="prod-links">
            <li>Kategori:</li>
            <li><a href="<?php echo categoryURL($prod_tiktok['main_kategori']);?>"><?php echo $prod_tiktok['main_kategori'] ;?></a></li>
            <li><a href="<?php echo categoryURL($prod_tiktok['main_kategori']);?>#<?php echo $id_kategori;?>"><?php echo $prod_tiktok['kategori'];?></a></li>
          </ul>
        
          <ul class="prod-links">
            <li>Share:</li>
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="https://wa.me/?text=<?php echo $text ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
          </ul><br>
          <a class="checkout-btn" href="<?php echo $prod_tiktok['url'];?>">Beli Sekarang</a><br>
          <a target="_blank" href="https://wa.me/?text=<?php echo $text ?>" id="whatsapp-button" style="position:fixed; bottom:10px; right:10px; width:50px; z-index:999;"><img loading="lazy" style="width:100%;" src="/assets/img/icon/whatsapp.png" /></a>
        </div>
      </section>
<?php }?><br>

      <!-- Produk Terkait -->
      <section class="prod-tabs">
        <h2 id="highlight">Produk Terkait Yang Mungkin Kamu Suka</h2>
        <div id="tab1" class="tab-pane active">
          <div class="prod-slick" data-nav="#slick-nav-1">
<?php
  $stmt = $dbcache->prepare("SELECT * FROM produk_cache WHERE kategori = :kategori AND id != :id");
  $stmt->bindValue(':kategori', $kategori, SQLITE3_TEXT);
  $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
  $result = $stmt->execute();
  while ($prod_tiktok = $result->fetchArray(SQLITE3_ASSOC)) {
    include $baseDir.'/partials/func/var.php';
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
    </main>

<?php require_once $baseDir.'/partials/footer.php';?>
  </body>
</html>