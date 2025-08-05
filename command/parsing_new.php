<?php
$db = new SQLite3('./databases/affiliate_link.db');

function curl_get_html($url) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
    ]);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

// Ganti str_ends_with dengan versi manual untuk PHP 7
function ends_with($haystack, $needle) {
    $length = strlen($needle);
    return $length > 0 ? substr($haystack, -$length) === $needle : true;
}

function convert_rating($ratingText) {
    $ratingText = strtoupper(trim($ratingText));
    if (ends_with($ratingText, 'K')) {
        return (int)(floatval($ratingText) * 1000);
    } elseif (ends_with($ratingText, 'M')) {
        return (int)(floatval($ratingText) * 1000000);
    }
    return (int) preg_replace('/[^\d]/', '', $ratingText);
}

function cariHarga($data) {
    $harga = ['real_price' => null, 'original_price' => null];
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($data));
    foreach ($iterator as $key => $value) {
        if ($key === 'price_val' && !$harga['real_price']) {
            $harga['real_price'] = (int) preg_replace('/[^\d]/', '', $value);
        }
        if ($key === 'original_price_value' && !$harga['original_price']) {
            $harga['original_price'] = (int) preg_replace('/[^\d]/', '', $value);
        }
        if ($harga['real_price'] && $harga['original_price']) break;
    }
    return $harga;
}

$results = $db->query("
    SELECT id, link_redirect, kategori, main_kategori, url 
    FROM link_tiktok 
    WHERE link_redirect IS NOT NULL 
      AND id NOT IN (SELECT link_id FROM produk_cache)
");

while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $url = $row['link_redirect'];
    $short = $row['url'];
    $kategori = $row['kategori'];
    $main_kategori = $row['main_kategori'];

    echo "Processing ID $id... ";

    $html = curl_get_html($url);
    if (!$html) {
        echo "✖ Gagal ambil HTML\n";
        continue;
    }

    file_put_contents("debug_$id.html", $html);

    preg_match('/<script[^>]+id="__MODERN_ROUTER_DATA__"[^>]*>(.*?)<\/script>/s', $html, $json_match);
    if (!isset($json_match[1])) {
        echo "✖ JSON router data tidak ditemukan\n";
        continue;
    }

    $json_raw = html_entity_decode($json_match[1], ENT_QUOTES);
    $json_data = json_decode($json_raw, true);
    file_put_contents("debug_json_$id.json", json_encode($json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    if (!$json_data) {
        echo "✖ Gagal decode JSON\n";
        continue;
    }

    $harga = cariHarga($json_data);
    $harga_new = $harga['real_price'];
    $harga_old = $harga['original_price'];

    if (!$harga_new || !$harga_old) {
        echo "✖ Harga tidak ditemukan di JSON\n";
        continue;
    }

    // Parsing data dari HTML
    preg_match('/<h1[^>]*>(.*?)<\/h1>/', $html, $title_match);
    preg_match_all('/<div class="text-nu9zLI[^"]*">(.*?)<\/div>/', $html, $desc_matches);
    preg_match('/<span class="infoRatingCount-lKBiTI">(.*?)<\/span>/', $html, $rating_match);
    preg_match('/<img src="([^"]+)"/', $html, $meta_img_match);
    $gambar_utama = $meta_img_match[1] ?? '';
    preg_match_all('/<img[^>]+data-src="([^"]+)"[^>]*>/', $html, $img_matches);
    $galeri_gambar = array_slice($img_matches[1], 0, 2);
    $gambar = array_merge([$gambar_utama], $galeri_gambar); // total jadi 3

    $title = html_entity_decode(strip_tags($title_match[1] ?? ''), ENT_QUOTES);
    $description = '';
    if (!empty($desc_matches[1])) {
      $description = implode("\n", array_map(function($d) {
        return html_entity_decode(strip_tags($d), ENT_QUOTES);
      }, $desc_matches[1]));
    }
    $rating = convert_rating($rating_match[1] ?? '');

    $stmt = $db->prepare("INSERT INTO produk_cache 
        (link_id, title, description, rating, image, image1, image2, harga_old, harga_new, url, favicon, kategori, custom_badge, main_kategori) 
        VALUES (:link_id, :title, :description, :rating, :img0, :img1, :img2, :old, :new, :url, :favicon, :kategori, :badge, :mainkat)");
    $stmt->bindValue(':link_id', $id);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':img0', $gambar[0] ?? '');
    $stmt->bindValue(':img1', $gambar[1] ?? '');
    $stmt->bindValue(':img2', $gambar[2] ?? '');
    $stmt->bindValue(':old', $harga_old);
    $stmt->bindValue(':new', $harga_new);
    $stmt->bindValue(':url', $short);
    $stmt->bindValue(':favicon', 'https://www.tiktok.com/favicon.ico');
    $stmt->bindValue(':kategori', $kategori);
    $stmt->bindValue(':badge', 'Hot Deal');
    $stmt->bindValue(':mainkat', $main_kategori);
    $stmt->execute();

    echo "✅ Sukses\n";
}

echo "Parsing selesai!\n";
?>