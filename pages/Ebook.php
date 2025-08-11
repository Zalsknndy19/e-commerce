<?php
  $baseDir = __DIR__.'/../';
  require_once $baseDir."/command/db.php";
  $ebookq = "SELECT * FROM ebook";
  $arrebook = $db->query($ebookq);

  require_once $baseDir.'/partials/func/functions.php';
  
?>
<!DOCTYPE html>
<html lang="id">
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. E-book";
  $ogdesc = "E-book Anak!";
  $ogimg = "/assets/img/splash/Ebook.webp";
  $activePage = 'Ebook';
  $ogurl = categoryURL($activePage);
  $ogtype = "website";
  $is_ebook_page = true;
  require_once $baseDir . '/partials/head.php';
?>
  <body>
<?php
  require_once $baseDir.'/partials/header.php'
?>
    <main>
      <section class="ebook-hero-section">
        <div class="container">
            <!-- Anda bisa tambahkan ilustrasi yang ceria di sini sebagai latar belakang -->
            <h1>Ciptakan Momen Mendongeng yang Tak Terlupakan</h1>
            <p>Bangun imajinasi si kecil dan tanamkan nilai kebaikan melalui koleksi cerita petualangan kami yang seru dan mendidik.</p>
            <!-- Tombol di sini bisa mengarahkan ke buku terlaris atau langsung scroll ke bawah -->
            <a href="#koleksi-buku" class="cta-button" hidden>Lihat Koleksi Buku</a>
        </div>
    </section>
        <section class="katalog">
            <div class="container">
                <h2>Koleksi Buku Cerita Kami</h2>
                <p>Yuk lihat koleksi Buku Cerita Anak di toko kami, koleksi bukunya akan ditambah secara berkala, jadi jangan sampai ketinggalan buku terbaru dengan cerita yang pastinya lebih seru!!!</p>
                <div class="katalog-grid">
<?php
  while ($ebook = $arrebook->fetchArray(SQLITE3_ASSOC)){
    require_once $baseDir.'/partials/func/functions.php';
    include $baseDir.'/partials/func/var.php';
?>
                    <!-- ================================== -->
                    <!--     MULAI BLOK PRODUK (Untuk PHP Loop)     -->
                    <!-- ================================== -->
                    <div class="buku-item">
                        <!-- Ganti dengan URL gambar cover buku Anda -->
                        <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/h_600/q_auto/<?php echo $ebook['img'];?>" alt="Foto <?php echo $ebook['judul'];?>">
                        <h3><?php echo $ebook['judul'];?></h3>
                        <p><?php echo substr($ebook['deskripsi'],0,50).'...';?></p>
                        <?php if ($ebook['harga_baru'] ===0):?>
                        <div class="harga-buku">Gratis</div>
                        <?php else: ?>
                        <div class="harga-buku">
                          <?php echo $harga_baru;?>
                        <?php endif;?>
                        <?php if ($ebook['harga_lama']!=0):?>
                        <span class="harga-old"><del><?php echo $harga_lama;?></del></span>
                        </div>
                        <?php endif;?>
                        <a href="<?php echo ebookDetailURL($ebook['id']);?>" class="cta-button-katalog">Lihat Detail</a>
                    </div>
                    <!-- ================================== -->
                    <!--      AKHIR BLOK PRODUK     -->
                    <!-- ================================== -->
<?php }?>
                    <!-- Ini adalah contoh buku kedua. Strukturnya sama persis. -->
                    <div class="buku-item">
                         <!-- Ganti dengan URL gambar cover buku Anda -->
                        <img src="<?php echo baseURL('/assets/img/fav.png');?>" alt="Foto Placeholder ZHStore">
                        <h3>Buku Selanjutnya...</h3>
                        <p>Tunggu kelanjutan buku-buku lainndengan cerita yang lebih menarik disini.</p>
                        <div class="harga-buku"><del>Rp.0</del></div>
                        <a href="#" class="cta-button-katalog">Tunggu yaa</a>
                    </div>

                    <!-- Anda bisa menambahkan lebih banyak buku di sini dengan menyalin blok di atas -->

                </div>
            </div>
        </section>
    </main>
<?php require_once $baseDir.'/partials/footer.php';?>
  </body>
</html>