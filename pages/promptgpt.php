<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  $gptdb = new SQLite3($baseDir.'/GPT/command/databases/gpt.db');
  $all = "SELECT * FROM prompt";
  $detail_all = $gptdb->query($all);
?>
<!DOCTYPE html>
<html lang="id">
<?php
  $ogtitle = "ZHStore. Prompt ChatGPT Keren.";
  $ogdesc = "Ubah Foto Selfie-mu Jadi Makin Keren Pakai Prompt AI Berikut!!!";
  $ogimg = "/assets/img/splash/meta_gpt.jpg";
  $ogurl = "https://store.zhwifi.web.id/pages/promptgpt.php";
  $ogtype = "website";
  $is_prompt_page = true;
  include $baseDir . '/partials/head.php';
?>
  <body>
<?php
  $activePage = 'Prompt';
  include $baseDir . '/partials/header.php';
;?>
    <main>
      <!-- Sambutan -->
      <section aria-labelledby="sambutan" class="sambutan">
        <header>
          <h1 id="sambutan">Selamat Datang di ZHStore.</h1>
        </header>
        <p>Pengen ngubah Foto Selfie-mu yang sebelumnya biasa aja jadi makin aesthetic kan??? Silahkan dicopy aja prompt nya, gratis kok 😁, mungkin kalian tertarik dong lihat-lihat produk yang ada disini, kalo minat langsung checkout aja yaaa🫡😊.
        </p>
      </section>
      <!-- / Sambutan -->
      
      <!-- Prompt Section -->
      <section>
        <h2 style="margin-bottom: 20px;" class="judul-kategori">Prompt Gallery ZHStore</h2>
        <div class="grid-container">
<?php while ($prompt = $detail_all->fetchArray(SQLITE3_ASSOC)) {
?>
          <div class="card">
            <span class="catbadge"><?php echo $prompt["kategori"]; ?></span>
            <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/q_auto/<?php echo $prompt['link_img'];?>" alt="Foto <?php echo $prompt['judul'];?>">
            <div class="card-content">
              <div class="card-title"><?php echo $prompt['judul'];?></div>
              <div class="card-meta">📋 <?php echo $prompt['counter_copy'];?>X Disalin/Copied</div>
              <a href="/pages/detail-prompt.php?id=<?php echo $prompt['id'];?>" class="card-button">Lihat Prompt</a>
            </div>
          </div>
<?php }?>
          <!-- Dummy Data -->
          <div class="card">
            <img style="filter: drop-shadow(0 0 0.4rem red);" src="/assets/img/fav.png" alt="Coming Soon">
            <div class="card-content">
              <div class="card-title">Prompt Lainnya Nyusul<br>Another Prompt Coming Soon</div>
              <div class="card-meta">Follow for More</div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Prompt Section -->
    </main>

<?php include $baseDir.'/partials/footer.php';?>
</body>
</html>