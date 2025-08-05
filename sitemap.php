<?php
header('Content-Type: application/xml');

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
  <!-- Halaman Utama -->
  <url>
    <loc>https://store.zhwifi.web.id/</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>1.0</priority>
  </url>

  <!-- Halaman Accessories Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Accessories.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman All Product Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/all_product.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Electronics Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Electronics.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Fashion Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Fashion.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Food Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Food.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Leather Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Leather.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Other Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/Other.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

  <!-- Halaman Prompt Gallery -->
  <url>
    <loc>https://store.zhwifi.web.id/pages/promptgpt.php</loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <priority>0.7</priority>
  </url>

<?php
$db = new SQLite3('./command/databases/affiliate_link.db');
$results = $db->query("SELECT id FROM produk_cache ORDER BY id DESC");

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $lastmod = date('Y-m-d');

    echo "
  <url>
    <loc>https://store.zhwifi.web.id/pages/aff_tiktok.php?kode=$id</loc>
    <lastmod>$lastmod</lastmod>
    <priority>0.8</priority>
  </url>";
}
?>

<?php
$db = new SQLite3('./GPT/command/databases/gpt.db');
$results = $db->query("SELECT id FROM prompt ORDER BY id DESC");

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $lastmod = date('Y-m-d');

    echo "
  <url>
    <loc>https://store.zhwifi.web.id/pages/detail_prompt.php?id=$id</loc>
    <lastmod>$lastmod</lastmod>
    <priority>0.8</priority>
  </url>";
}
?>
</urlset>