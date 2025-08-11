<?php
  $baseDir = __DIR__.'/../';
  require_once $baseDir."/command/db.php";
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $ebookq = "SELECT * FROM ebook WHERE id = $id";
  $arrebook = $db->query($ebookq);
  $ebook = $arrebook->fetchArray(SQLITE3_ASSOC);

  require_once $baseDir.'/partials/func/functions.php';
  require_once $baseDir.'/partials/func/var.php'
?>
<!DOCTYPE html>
<html lang="id">
<?php
  require_once __DIR__.'/../partials/func/config.php';
  $ogtitle = "ZHStore. E-book ".'"'.$ebook['judul'].'"';
  $ebook_description = $ebook['deskripsi'];
  $ogdesc = "Jadikan waktu tidur lebih tenang dan berkualitas dengan cerita petualangan penuh warna yang akan disukai si kecil. Alternatif sehat pengganti layar gadget.";
  $ogimg = "https://res.cloudinary.com/dii1gyt4o/image/upload/".htmlspecialchars($ebook['img']);
  $activePage = 'Ebook';
  $ogurl = ebookDetailURL($id);
  $text = 'Lihat Ebook anak yang edukatif ini di ZHStore! ' . $ogurl;
  $ogtype = "product";
  $is_ebook_page = true;
  $is_detail_ebook = true;
  require_once $baseDir . '/partials/head.php';
?>
  <body>
<?php require_once $baseDir.'/partials/header.php';?>
    <main>
        <section class="hero">
            <div class="container">
                <h1><?php echo $ebook['judul'];?></h1>
                <p>E-book berjudul "<?php echo $ebook['judul'];?>" adalah sebuah E-book Cerita Penuh Petualangan, Persahabatan, dan Pelajaran Berharga untuk si Kecil.</p>
                <a href="#harga" class="cta-button-main">Baca Petualangannya!</a>
            </div>
        </section>

        <section class="pengenalan">
            <div class="container">
                <h2>Kenalan Yuk Sama Karakter Favorit di E-book "<?php echo $ebook['judul'];?>"!</h2>
                <div class="content">
                    <!-- Ganti 'kiki.png' dengan URL gambar karakter Anda -->
                    <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/q_auto/<?php echo $ebook['img'];?>" alt="Karakter Favorit di E-book <?php echo '"'.$ebook['judul'].'"';?>" class="karakter-img">
                    <p><?php echo $ebook['deskripsi'];?></p>
                </div>
            </div>
        </section>

        <section class="fitur">
            <div class="container">
                <h2>Apa Saja yang Ada di Dalam Cerita Ini?</h2>
                <div class="fitur-grid">
                    <div class="fitur-item">
                        <div class="icon">❤️</div>
                        <h3>Pesan Moral</h3>
                        <p>Penuh pelajaran tentang kebaikan, keberanian, dan arti persahabatan.</p>
                    </div>
                    <div class="fitur-item">
                        <div class="icon">🎨</div>
                        <h3>Ilustrasi Ceria</h3>
                        <p>Gambar penuh warna yang akan merangsang imajinasi anak.</p>
                    </div>
                    <div class="fitur-item">
                        <div class="icon">📖</div>
                        <h3>Bahasa Sederhana</h3>
                        <p>Mudah dipahami dan cocok untuk dibacakan sebelum tidur (usia 3-7 tahun).</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pratinjau">
            <div class="container">
                <h2>Intip Beberapa Halaman Ceritanya!</h2>
                 <div class="galeri">
                    <!-- Ganti dengan URL gambar halaman e-book Anda -->
                    <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/q_auto/<?php echo $ebook['pre1'];?>" alt="Pratinjau Halaman 1">
                    <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/q_auto/<?php echo $ebook['pre2'];?>" alt="Pratinjau Halaman 2">
                </div>
            </div>
        </section>
        
        <section class="testimoni">
            <div class="container">
                <h2>Kata Mereka yang Sudah Membaca</h2>
                <div class="testimoni-grid">
                    <div class="testimoni-item">
                        <p>"Anak saya suka sekali dengan karakter Leo dari Ebook Singa Yang Tak Suka Mengaum! Ceritanya seru dan gambarnya lucu-lucu."</p>
                        <span>- Bunda Rina</span>
                    </div>
                     <div class="testimoni-item">
                        <p>"Sangat membantu untuk dongeng sebelum tidur. Pesan moralnya juga bagus dan mudah dipahami."</p>
                        <span>- Ayah Budi</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="harga" class="final-cta">
             <div class="container">
                <h2>Siap Memulai Petualangan Imajinasi seru dengan E-book "<?php echo $ebook['judul'];?>"?!?</h2>
                <?php if ($ebook['harga_baru'] ===0):?>
                <p class="harga">GRATIS!!!</p>
                <?php else: ?>
                <p class="harga">
                  Hanya <?php if ($ebook['harga_lama']!=0):?><del style="font-size:20px;"><?php echo $harga_lama;?></del>
                  <?php endif;?> <?php echo $harga_baru;?>!
                </p>
                        <?php endif;?>
      

                <a target="_blank" href="<?php echo $ebook['lynk'];?>" class="cta-button-final">Ambil E-booknya Di Sini!</a>
                <a target="_blank" href="https://wa.me/?text=<?php echo $text ?>" id="whatsapp-button" style="position:fixed; bottom:10px; right:10px; width:50px; z-index:999;"><img loading="lazy" style="width:100%;" src="/assets/img/icon/whatsapp.png" /></a>
             </div>
        </section>

    </main>
<?php
  require_once $baseDir.'/partials/footer.php';
?>
  </body>
</html>