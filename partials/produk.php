<?php
include $baseDir.'/partials/func/all.php';
require_once $baseDir.'/partials/func/config.php';
?>
      <section>
        <h2 class="judul-kategori" id="<?php echo $id_kategori;?>"><?php echo $judul_kategori;?></h2>
        <div class="product-grid">
<?php
  
  foreach ($visible_products as $prod_tiktok) {
    // tampilkan 4 produk saja
    include $baseDir.'/partials/func/var.php';
?>
          <article class="card-new">
            <div class="badge"><?php echo $prod_tiktok["custom_badge"];?></div>
            <div class="tilt">
              <div class="img">
                <img loading="lazy" class="badgeaff" src="<?php echo $prod_tiktok["favicon"];?>">
                <img loading="lazy" src="<?php echo $prod_tiktok["image"];?>" alt="<?php echo "Foto " . $title_cut;?>">
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
          </article>
<?php }?>
        </div>
        <div>
<?php if($jumlah_produk>4):?>
          <div style="text-align:center; margin: 10px;position:sticky;top:10px;z-index:1001;">
            <button class="lihat-semua">Lihat Semua Produk</button>
          </div>
<?php endif; ?>
          <div class="produk-sisa">
<?php
  foreach ($hidden_products as $prod_tiktok) {
    // tampilkan sisa produk
    include $baseDir.'/partials/func/var.php';
?>
            <article class="card-new">
              <div class="badge"><?php echo $prod_tiktok["custom_badge"];?></div>
              <div class="tilt">
                <div class="img">
                  <img loading="lazy" class="badgeaff" src="<?php echo $prod_tiktok["favicon"];?>">
                  <img loading="lazy" src="<?php echo $prod_tiktok["image"];?>" alt="<?php echo "Foto " . $title_cut;?>">
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
                    <a href="<?php echo aff_tiktokDetailURL($prod_tiktok["id"]);?>">Cek Disini <i class="fa-solid fa-bag-shopping"></i></a>
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
            </article>
<?php }?>
          </div>
        </div>
      </section>
