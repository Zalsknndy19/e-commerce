<?php
// =======================================================
//          ZHStore - Front Controller (index.php)
// =======================================================

// Sertakan file konfigurasi & fungsi utama Anda
require_once __DIR__ . '/partials/func/config.php';
require_once __DIR__ . '/partials/func/functions.php';

// Ambil path URL yang bersih dari permintaan asli pengguna
$requestPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Pisahkan path menjadi beberapa bagian
$pathParts = explode('/', $requestPath);

// =======================================================
//                      LOGIKA ROUTING
// =======================================================

// Gunakan bagian pertama dari path sebagai penentu utama
$mainRoute = $pathParts[0] ?? '';

switch ($mainRoute) {

    case '':
        // Ini adalah halaman utama (homepage)
        // Masukkan kode untuk menampilkan halaman utama Anda di sini
        include __DIR__ . '/homepage.php'; // Misalnya Anda punya file homepage.php
        break;

    case 'kategori':
        // Logika untuk /kategori/fashion
        if (isset($pathParts[1])) {
            $kategori = $pathParts[1];
            $_GET['kategori'] = $kategori; // Set $_GET agar halaman target bisa menggunakannya
            include __DIR__ . '/pages/' . ucfirst($kategori) . '.php';
        } else {
            // Jika hanya /kategori tanpa nama, bisa arahkan ke halaman semua produk
            include __DIR__ . '/pages/all_product.php';
        }
        break;

    case 'aff_tiktok':
        // Logika untuk /aff_tiktok/detail/123
        if (isset($pathParts[1]) && $pathParts[1] === 'detail' && isset($pathParts[2])) {
            $idProduk = $pathParts[2];
            $_GET['kode'] = $idProduk; // Set $_GET untuk file aff_tiktok.php
            include __DIR__ . '/pages/aff_tiktok.php';
        } else {
            // Jika hanya /aff_tiktok, mungkin tampilkan halaman 404
            include __DIR__ . '/404.html';
        }
        break;

    case 'ebook':
        // Logika untuk /ebook dan /ebook/detail/45
        if (isset($pathParts[1]) && $pathParts[1] === 'detail' && isset($pathParts[2])) {
            // Ini untuk halaman detail e-book
            $idEbook = $pathParts[2];
            $_GET['id'] = $idEbook;
            include __DIR__ . '/pages/detail-ebook.php'; // Pastikan file ini ada
        } else {
            // Ini untuk halaman katalog e-book
            include __DIR__ . '/pages/Ebook.php';
        }
        break;
        
    case 'prompt':
        // Logika untuk /prompt/detail/67
        if (isset($pathParts[1]) && $pathParts[1] === 'detail' && isset($pathParts[2])) {
            $idPrompt = $pathParts[2];
            $_GET['id'] = $idPrompt;
            include __DIR__ . '/pages/detail-prompt.php';
        } else {
            include __DIR__ . '/404.html';
        }
        break;

    default:
        // Jika tidak ada rute yang cocok, tampilkan halaman 404
        http_response_code(404);
        include __DIR__ . '/404.html';
        break;
}