<?php
// config.php

// -----------------------------------------------------------------------------
// 1. PENGATURAN LINGKUNGAN
// -----------------------------------------------------------------------------

// Pertama, dapatkan nama host yang sebenarnya, prioritaskan X-Forwarded-Host dari proxy.
$current_host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'] ?? 'localhost';

// Kedua, gunakan nama host yang benar untuk menentukan lingkungan.
// Ganti 'zhwifi.io' dengan domain lokal Anda jika berubah di masa depan.
define('IS_DEVELOPMENT', ($current_host === 'zhwifi.io'));
/**
* Perubahan Kunci:
* 1.  Kita membuat variabel baru, `$current_host`, yang akan selalu berisi nama domain yang benar (`zhwifi.io` di lokal).
* 2.  Kita kemudian menggunakan variabel `$current_host` ini untuk mendefinisikan `IS_DEVELOPMENT`.
*/

// -----------------------------------------------------------------------------
// 2. FUNGSI HELPER UNTUK MEMBUAT URL
// -----------------------------------------------------------------------------

/**
 * Dan jangan lupa pastikan fungsi `baseURL()` juga menggunakan `$current_host` agar konsisten (jika Anda belum melakukannya).
 * Membuat URL lengkap ke path tertentu di dalam situs.
 * Ini memastikan semua link (aset, halaman) menggunakan basis URL yang benar.
 *
 * Contoh penggunaan:
 * echo baseURL('assets/css/style.css'); // -> http://zhwifi.io/assets/css/style.css
 */
 
 function baseURL($path = '') {
    global $current_host; // Ambil variabel global

    // Hapus garis miring di awal path ...
    $path = ltrim($path, '/');
    
    // Tentukan protokol ...
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    
    // Gunakan host yang sudah kita definisikan di atas
    return "{$protocol}://{$current_host}/{$path}";
}


/**
 * Membuat URL yang benar untuk halaman kategori.
 * Fungsi ini "pintar": ia tahu URL mana yang harus dibuat berdasarkan lingkungan.
 *
 * Contoh penggunaan:
 * echo categoryURL('fashion');
 * // -> (di lokal) http://zhwifi.io/pages/Fashion.php
 * // -> (di produksi) https://store.zhwifi.web.id/kategori/fashion
 */
function categoryURL($categoryName) {
    if (IS_DEVELOPMENT) {
        // Lingkungan Development: Gunakan path file PHP asli.
        // ucfirst() membuat huruf pertama jadi besar (fashion -> Fashion)
        return baseURL('kategori/' . strtolower($categoryName));
    } else {
        // Lingkungan Produksi: Gunakan struktur Clean URL.
        // strtolower() untuk konsistensi URL (Fashion -> fashion)
        return baseURL('kategori/' . strtolower($categoryName));
    }
}

/**
 * Membuat URL yang benar untuk katalog E-book.
 *
 * Contoh penggunaan:
 * echo ebookCatalogURL();
 * // -> (di lokal) http://zhwifi.io/ebook/index.php
 * // -> (di produksi) https://store.zhwifi.web.id/ebook/
 */
function ebookCatalogURL() {
    if (IS_DEVELOPMENT) {
        // Lingkungan Development
        return baseURL('ebook/');
    } else {
        // Lingkungan Produksi
        return baseURL('ebook/');
    }
}

/**
 * Membuat URL yang benar untuk halaman detail produk aff_tiktok.
 *
 * Contoh penggunaan:
 * echo aff_tiktokDetailURL(123); // Anggap 123 adalah ID produk
 * // -> (di lokal) http://zhwifi.io/pages/aff_tiktok.php?kode=123
 * // -> (di produksi) https://store.zhwifi.web.id/aff_tiktok/detail/123
 */
function aff_tiktokDetailURL($aff_tiktokId) {
    if (IS_DEVELOPMENT) {
        // Lingkungan Development
        return baseURL('aff_tiktok/detail/' . $aff_tiktokId);
    } else {
        // Lingkungan Produksi (Asumsi ada aturan .htaccess untuk ini)
        return baseURL('aff_tiktok/detail/' . $aff_tiktokId);
    }
}

/**
 * Membuat URL yang benar untuk halaman detail produk e-book.
 *
 * Contoh penggunaan:
 * echo ebookDetailURL(123); // Anggap 123 adalah ID buku
 * // -> (di lokal) http://zhwifi.io/ebook/detail.php?id=123
 * // -> (di produksi) https://store.zhwifi.web.id/ebook/detail/123
 */
function ebookDetailURL($ebookId) {
    if (IS_DEVELOPMENT) {
        // Lingkungan Development
        return baseURL('ebook/detail/' . $ebookId);
    } else {
        // Lingkungan Produksi (Asumsi ada aturan .htaccess untuk ini)
        return baseURL('ebook/detail/' . $ebookId);
    }
}

/**
 * Membuat URL yang benar untuk halaman detail prompt.
 *
 * Contoh penggunaan:
 * echo promptDetailURL(123); // Anggap 123 adalah ID prompt
 * // -> (di lokal) http://zhwifi.io/pages/detail-prompt.php?id=123
 * // -> (di produksi) https://store.zhwifi.web.id/prompt/detail/123
 */
function promptDetailURL($promptId) {
    if (IS_DEVELOPMENT) {
        // Lingkungan Development
        return baseURL('prompt/detail/' . $promptId);
    } else {
        // Lingkungan Produksi (Asumsi ada aturan .htaccess untuk ini)
        return baseURL('prompt/detail/' . $promptId);
    }
}

// Tambahkan fungsi helper lain di sini jika diperlukan,
// misalnya untuk halaman 'about.php', 'contact.php', dll.
function auto_version($file) {
  $filepath = $_SERVER['DOCUMENT_ROOT'] . $file;
  if (file_exists($filepath)) {
    return $file . '?v=' . filemtime($filepath);
  } else {
    return $file; // fallback kalau file gak ditemukan
  }
}
?>