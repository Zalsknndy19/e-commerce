<?php
$db = new SQLite3('./databases/affiliate_link.db');
$produk = $db->query("SELECT id, title, description, harga_new FROM produk_cache LIMIT 20");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin ZHStore</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Logo -->
  <div class="flex justify-center items-center py-4">
    <img src="https://store.zhwifi.web.id/img/logo.png" alt="ZHStore Logo" class="h-12 w-auto">
  </div>

  <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-4">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-xl font-bold">Dashboard Produk</h1>
      <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Produk</a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto text-sm border">
        <thead class="bg-gray-200 text-gray-700 text-left">
          <tr>
            <th class="p-2">Nama Produk</th>
            <th class="p-2">Deskripsi</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Stok</th>
            <th class="p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $produk->fetchArray(SQLITE3_ASSOC)): ?>
            <tr class="border-t">
              <td class="p-2"><?= htmlspecialchars(substr($row['title'], 0, 30)) ?></td>
              <td class="p-2"><?= htmlspecialchars(substr($row['description'], 0, 30)) ?>...</td>
              <td class="p-2">Rp<?= number_format($row['harga_new'], 0, ',', '.') ?></td>
              <td class="p-2">Tersedia</td>
              <td class="p-2">
                <a href="#" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                <a href="#" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>