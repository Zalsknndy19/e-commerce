<?php
// admin_panel.php
$db = new SQLite3('./databases/affiliate_link.db');

$results = $db->query("
    SELECT p.id, p.link_id, p.title, p.description, p.rating, p.harga_new, p.harga_old, p.image, p.url,
           p.kategori, p.main_kategori, l.url AS short_url
    FROM produk_cache p
    LEFT JOIN link_tiktok l ON p.link_id = l.id
    ORDER BY p.id DESC
");

function shorten($text, $max = 50) {
    return strlen($text) > $max ? substr($text, 0, $max) . '...' : $text;
}
?><!DOCTYPE html><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#7ecca0">
    <title>Admin Produk TikTok</title>
    <style>
        table { border-collapse: collapse; width: 100%; font-size: 14px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        td img { max-width: 60px; }
        .action-btn { padding: 4px 8px; margin: 2px; cursor: pointer; }
    </style>
</head>
<body>
  <img width="12%" src="../img/logo.png"/>
<h2>Admin Panel Produk</h2>
<button>Tambah Data</button>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Link ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Rating</th>
            <th>Image</th>
            <th>Kategori</th>
            <th>Main Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $results->fetchArray(SQLITE3_ASSOC)) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td id="<?= $row['link_id'] ?>"><?= $row['link_id'] ?></td>
            <td title="<?= htmlspecialchars($row['title']) ?>">
                <?= htmlspecialchars(shorten($row['title'])) ?>
            </td>
            <td title="<?= htmlspecialchars($row['description']) ?>">
              <?= htmlspecialchars(shorten($row['description'])) ?>
            </td>
            <td>Rp<?= number_format($row['harga_new']) ?> <small style="color:gray;">(Rp<?= number_format($row['harga_old']) ?>)</small></td>
            <td><?= $row['rating'] ?></td>
            <td>
                <?php if ($row['image']) : ?>
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="img">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['kategori']) ?></td>
            <td><?= htmlspecialchars($row['main_kategori']) ?></td>
            <td>
                <form action="update_entry.php" method="POST" target="_blank">
                    <a href="update_entry.php?id=<?= $row['link_id'] ?>">🔄</a>
                </form><button>Edit</button><button>Hapus</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>