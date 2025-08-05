<?php
$db = new SQLite3(__DIR__ . '/databases/affiliate_link.db');

// Ambil semua data link affiliate
$results = $db->query("SELECT * FROM link_tiktok ORDER BY status DESC");
$no = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Link Affiliate</title>
  <style>
    body { font-family: sans-serif; padding: 20px; background: #f9f9f9; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background-color: #eee; }
    a.button {
      padding: 6px 12px;
      background: #2196f3;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    a.button:hover {
      background: #1976d2;
    }
  </style>
</head>
<body>

<h2>🔗 Daftar Link Affiliate</h2>
<p>Klik tombol redirect untuk membuka link asli. Setelah terbuka, salin informasi produk secara manual ke database produk_cache.</p>

<table>
  <thead>
    <tr>
      <th>No.</th>
      <th>ID</th>
      <th>Shortlink</th>
      <th>Kategori</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $results->fetchArray(SQLITE3_ASSOC)) : ?>
      <tr>
        <td><span><?php echo $no++;?></span></td>
        <td><span><?= htmlspecialchars($row['id']) ?></span></td>
        <td><?= htmlspecialchars($row['url']) ?></td>
        <td><?= htmlspecialchars($row['kategori']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
        <td>
          <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank">
          <button>🔗 Redirect</button>
          </a>
          <a href="input_cache.php?link_id=<?= htmlspecialchars($row['id']) ?>" target="_blank"> 
          <button>🔗 Input Data</button>
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>