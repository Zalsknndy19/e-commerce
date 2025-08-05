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

$link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($link_id <= 0) {
    echo "ID tidak valid.";
    exit;
}

$row = $db->querySingle("
    SELECT lt.link_redirect, lt.kategori, lt.main_kategori, lt.url 
    FROM link_tiktok lt
    WHERE lt.id = $link_id
", true);

if (!$row || empty($row['link_redirect'])) {
    echo "Data tidak ditemukan atau belum ada link_redirect.";
    exit;
}

$url = $row['link_redirect'];
$short = $row['url'];
$kategori = $row['kategori'];
$main_kategori = $row['main_kategori'];

$html = curl_get_html($url);
if (!$html) {
    echo "Gagal mengambil HTML.";
    exit;
}

preg_match('/<script[^>]+id="__MODERN_ROUTER_DATA__"[^>]*>(.*?)<\/script>/s', $html, $json_match);
if (!isset($json_match[1])) {
    echo "Data JSON tidak ditemukan.";
    exit;
}

$json_raw = html_entity_decode($json_match[1], ENT_QUOTES);
$json_data = json_decode($json_raw, true);
if (!$json_data) {
    echo "Gagal decode JSON.";
    exit;
}

$harga = cariHarga($json_data);
$harga_new = $harga['real_price'];
$harga_old = $harga['original_price'];

preg_match('/<h1[^>]*>(.*?)<\/h1>/', $html, $title_match);
// Ambil semua div yang mengandung class "text-nu9zLI"
preg_match_all('/<div[^>]*class="[^"]*text-nu9zLI[^"]*"[^>]*>(.*?)<\/div>/s', $html, $desc_matches);
preg_match('/<span class="infoRatingCount-lKBiTI">(.*?)<\/span>/', $html, $rating_match);
preg_match('/<img src="([^"]+)"/', $html, $meta_img_match);
    $gambar_utama = $meta_img_match[1] ?? '';
    preg_match_all('/<img[^>]+data-src="([^"]+)"[^>]*>/', $html, $img_matches);
    $galeri_gambar = array_slice($img_matches[1], 0, 2);
    $gambar = array_merge([$gambar_utama], $galeri_gambar); // total jadi 3

$title = html_entity_decode(strip_tags($title_match[1] ?? ''), ENT_QUOTES);

// Gabungkan semua baris deskripsi jadi satu
$description = '';
foreach ($desc_matches[1] as $desc) {
    $description .= trim(strip_tags(html_entity_decode($desc, ENT_QUOTES))) . "\n";
}
$description = trim($description); // Bersihkan newline di akhir
$rating = convert_rating($rating_match[1] ?? '');


$stmt = $db->prepare("
    UPDATE produk_cache SET 
        title = :title, 
        description = :description,
        rating = :rating,
        image = :img0,
        image1 = :img1,
        image2 = :img2,
        harga_old = :old,
        harga_new = :new,
        favicon = :favicon,
        kategori = :kategori,
        custom_badge = :badge,
        main_kategori = :mainkat,
        url = :url
    WHERE link_id = :link_id
");

$stmt->bindValue(':title', $title);
$stmt->bindValue(':description', $description);
$stmt->bindValue(':rating', $rating);
$stmt->bindValue(':img0', $gambar[0] ?? '');
$stmt->bindValue(':img1', $gambar[1] ?? '');
$stmt->bindValue(':img2', $gambar[2] ?? '');
$stmt->bindValue(':old', $harga_old);
$stmt->bindValue(':new', $harga_new);
$stmt->bindValue(':favicon', 'https://www.tiktok.com/favicon.ico');
$stmt->bindValue(':kategori', $kategori);
$stmt->bindValue(':badge', 'Hot Deal');
$stmt->bindValue(':mainkat', $main_kategori);
$stmt->bindValue(':url', $short);
$stmt->bindValue(':link_id', $link_id);
$stmt->execute();

echo "✅ Data untuk ID $link_id berhasil diupdate.<br>";
echo "<a href='admin.php#$link_id'>← Kembali ke Admin Panel</a>";
?>