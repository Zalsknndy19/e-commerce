<?php
$db = new SQLite3(__DIR__ . '/databases/affiliate_link.db');

$link_id = $_GET['link_id'] ?? null;

if (!$link_id) {
    echo "❌ link_id tidak tersedia.";
    exit;
}

// Ambil data dari link_tiktok
$link = $db->querySingle("SELECT * FROM link_tiktok WHERE id = $link_id", true);
if (!$link) {
    echo "❌ Data link_tiktok tidak ditemukan.";
    exit;
}

// Cek apakah data sudah ada di produk_cache
$produk = $db->querySingle("SELECT * FROM produk_cache WHERE link_id = $link_id", true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($produk) {
        // Mode Update
        $stmt = $db->prepare("UPDATE produk_cache SET 
            title = :title, description = :description, image = :image, 
            url = :url, favicon = :favicon, kategori = :kategori, harga_new = :harga_new, 
            harga_old = :harga_old, rating = :rating, custom_badge = :custom_badge,
            image1 = :image1, image2 = :image2, main_kategori = :main_kategori
            WHERE link_id = :link_id");
    } else {
        // Mode Insert
        $stmt = $db->prepare("INSERT INTO produk_cache 
            (link_id, title, description, image, url, favicon, kategori, harga_new, harga_old, rating, custom_badge, image1, image2, main_kategori) 
            VALUES (:link_id, :title, :description, :image, :url, :favicon, :kategori, :harga_new, :harga_old, :rating, :custom_badge, :image1, :image2, :main_kategori)");
    }

    $stmt->bindValue(':link_id', $link['id'], SQLITE3_INTEGER);
    $stmt->bindValue(':title', $_POST['title']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->bindValue(':image', $_POST['image']);
    $stmt->bindValue(':url', $link['url']);
    $stmt->bindValue(':favicon', $_POST['favicon']);
    $stmt->bindValue(':kategori', $link['kategori']);
    $stmt->bindValue(':harga_new', $_POST['harga_new']);
    $stmt->bindValue(':harga_old', $_POST['harga_old']);
    $stmt->bindValue(':rating', $_POST['rating']);
    $stmt->bindValue(':custom_badge', $_POST['custom_badge']);
    $stmt->bindValue(':image1', $_POST['image1']);
    $stmt->bindValue(':image2', $_POST['image2']);
    $stmt->bindValue(':main_kategori', $link['main_kategori']);
    $stmt->execute();

    // Update status link_tiktok
    $update = $db->prepare("UPDATE link_tiktok SET status = 'done' WHERE id = :id");
    $update->bindValue(':id', $link['id'], SQLITE3_INTEGER);
    $update->execute();

    echo "<p>✅ Data berhasil " . ($produk ? "diperbarui" : "disimpan") . ".</p>";
    echo "<p><a href='link.php'>🔙 Kembali ke Viewer</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $produk ? "Edit Produk" : "Input Produk Baru" ?></title>
</head>
<body>
    <h2><?= $produk ? "✏️ Edit Produk" : "📝 Input Produk Baru" ?></h2>
  <label for="raw_content" hidden>Paste hasil copy-an di sini:</label><br>
  <textarea hidden name="raw_content" id="raw_content" rows="30" cols="100" style="width:69%; max-width:80%;"></textarea><br><br>
    <form method="POST">
        
        <label>Judul:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($produk['title'] ?? '') ?>"><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="description"><?= htmlspecialchars($produk['description'] ?? '') ?></textarea><br><br>

        <label>Image utama:</label><br>
        <input hidden type="text" name="favicon" value="https://www.tiktok.com/favicon.ico">
        <input type="text" name="image" value="<?= htmlspecialchars($produk['image'] ?? '') ?>"><br><br>

        <label>Image 1:</label><br>
        <input type="text" name="image1" value="<?= htmlspecialchars($produk['image1'] ?? '') ?>"><br><br>

        <label>Image 2:</label><br>
        <input type="text" name="image2" value="<?= htmlspecialchars($produk['image2'] ?? '') ?>"><br><br>

        <label>Harga baru:</label><br>
        <input type="text" name="harga_new" value="<?= htmlspecialchars($produk['harga_new'] ?? '') ?>"><br><br>

        <label>Harga lama:</label><br>
        <input type="text" name="harga_old" value="<?= htmlspecialchars($produk['harga_old'] ?? '') ?>"><br><br>

        <label>Rating:</label><br>
        <input type="text" name="rating" value="<?= htmlspecialchars($produk['rating'] ?? '') ?>"><br><br>

        <label>Custom badge (opsional):</label><br>
        <input type="text" name="custom_badge" value="<?= htmlspecialchars($produk['custom_badge'] ?? '') ?>"><br><br>

        <button type="submit"><?= $produk ? "💾 Update Produk" : "💾 Simpan Produk" ?></button>
    </form>
</body>
</html>