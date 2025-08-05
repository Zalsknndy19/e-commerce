<?php
  $kategori = $load_kategori;
  $all_products = [];
  while ($prod_tiktok_all = $kategori->fetchArray(SQLITE3_ASSOC)) {
    $all_products[] = $prod_tiktok_all; // tampung dulu semua data
    $id_kategori = strtolower(str_replace(' ', '-', $prod_tiktok_all['kategori'])); // ganti spasi jadi -
  }
  $jumlah_produk = count($all_products);
  $visible_products = array_slice($all_products, 0, 4); // ambil 4 pertama
  $hidden_products = array_slice($all_products,4);
?>