<?php
  $baseDir = realpath(__DIR__ . '/../'); // ini berarti mengarah ke webroot
  $gptdb = new SQLite3($baseDir.'/GPT/command/databases/gpt.db');
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $query = "SELECT * FROM prompt WHERE id = $id";
  $result = $gptdb->query($query);
  $data = $result->fetchArray(SQLITE3_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<?php
  $ogtitle = "ZHStore. ".$data['judul']." Detail Page";
  $ogdesc = "Ubah Foto Selfie-mu Jadi Lebih Menarik Dengan Prompt ChatGPT Yang Satu Ini!!!";
  $ogimg = "https://res.cloudinary.com/dii1gyt4o/image/upload/".htmlspecialchars($data['link_img']);
  $ogurl = "https://store.zhwifi.web.id/pages/detail-prompt.php?id=".$id;
  $ogtype = "product";
  $is_prompt_page = true;
  include $baseDir . '/partials/head.php';
?>
  <body>
<?php
  $activePage = 'Prompt';
  include $baseDir . '/partials/header.php';
;?>
    <main>
      <h1 class="judul-kategori"><?php echo $data['judul'];?></h1>
      <section class="container">
        <p style="margin-bottom: 24px;"><span class="ket">Preview Gambar:</span></p>
        <div class="image-wrapper">
          <img src="https://res.cloudinary.com/dii1gyt4o/image/upload/<?php echo htmlspecialchars($data['link_img']); ?>" alt="Hasil Prompt AI">
        </div>
        <p style="margin-bottom: 24px; margin-top:24px;"><span class="ket">Prompt:</span></p>
        <div class="prompt-box">
          <textarea rows="6" readonly class="prompt-text"><?php echo htmlspecialchars($data['prompt_text']); ?></textarea>
          <button class="copy-btn">Copy Prompt</button>
          <div class="copied-msg">✓ Prompt berhasil disalin!</div>
        </div>
        <p style="color: white;font-weight: 400;font-size:14px;">
          Note:<br>
          Setelah Prompt berhasil ter-copy, buka ChatGPT atau aplikasi apapun yang Anda pakai lalu upload foto yang ingin diedit selanjutnya Tempelkan Prompt yang sudah di-copy.<br><br>
          In English:<br>
          After the Prompt has been successfully copied, open ChatGPT or whatever application you are using, then upload the photo you want to edit, then paste the copied Prompt.
        </p>
      </section>
    </main>


<?php include $baseDir.'/partials/footer.php';?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const copyBtn = document.querySelector('.copy-btn');
      const textarea = document.querySelector('.prompt-text');
      const copiedMsg = document.querySelector('.copied-msg');
      const promptId = <?php echo $id; ?>;

      copyBtn.addEventListener('click', async function () {
        const text = textarea.value.trim();

        try {
          // Cara modern (HTTPS, host resmi)
          await navigator.clipboard.writeText(text);
          showSuccess();
        } catch (err) {
          // Fallback untuk HTTP / localhost
          textarea.select();
          const success = document.execCommand('copy');
          if (success) {
            showSuccess();
          } else {
            alert('Gagal menyalin prompt!');
          }
        }

        function showSuccess() {
          copiedMsg.style.display = 'block';
          setTimeout(() => copiedMsg.style.display = 'none', 8000);
          fetch(`/GPT/command/update_copy_count.php?id=${promptId}`);
        }
      });
    });
  </script>
</body>
</html>