<?php
$title_cut = potong_title($prod_tiktok["title"], 20);
$title_fix = strtolower($title_cut);
$title_fix = ucwords($title_fix);
$desc_cut = potong_title($prod_tiktok["description"], 75);
$harga_new = "Rp. " .number_format($prod_tiktok["harga_new"], 0, ",", ".");
$harga_old = "Rp. " .number_format($prod_tiktok["harga_old"], 0, ",", ".");
$jumlah_review = formatJumlah($prod_tiktok["rating"]);
$rating = ratingSemua($prod_tiktok["rating"]);
?>