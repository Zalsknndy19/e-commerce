<?php
$db = new SQLite3('./databases/affiliate_link.db');

// Ambil shortlink yang belum diproses
$query = $db->query("
    SELECT id, url 
    FROM link_tiktok 
    WHERE (status = 'pending') 
       OR (status = 'done' AND (link_redirect IS NULL OR link_redirect = ''))
");

while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $shortlink = $row['url'];

    // Gunakan cURL untuk follow redirect
    $ch = curl_init($shortlink);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 10,
    ]);
    curl_exec($ch);
    $final_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($final_url && $http_code >= 200 && $http_code < 400) {
        // Update kolom link_redirect dan status
        $stmt = $db->prepare("UPDATE link_tiktok SET link_redirect = :link, status = 'done' WHERE id = :id");
        $stmt->bindValue(':link', $final_url, SQLITE3_TEXT);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        echo "✅ ID $id berhasil: $final_url\n";
    } else {
        echo "⚠️ ID $id gagal resolve: $shortlink\n";
    }
}

echo "Selesai.\n";