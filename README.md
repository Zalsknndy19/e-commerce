# 💼 ZHStore - Template E-Commerce Gratis

ZHStore adalah template e-commerce PHP ringan dengan tampilan modern dan fitur parsing otomatis dari TikTok Shop. Cocok untuk dijalankan di hosting gratis seperti **AwardSpace** atau **InfinityFree**.

---

## 🎁 Apa yang Kamu Dapatkan?

Template e-commerce ini sudah dilengkapi dengan:
- ✅ Halaman dinamis berbasis PHP
- ✅ File database SQLite yang sudah berisi data produk (siap pakai)
- ✅ Desain responsif dan ringan untuk HP
- ✅ Bisa langsung dijalankan di AwardSpace (tanpa aplikasi tambahan)

---

## 📌 Penting!
- File `affiliate_link.db` adalah database yang sudah diisi produk.
- Jangan hapus file ini jika ingin langsung melihat contoh produk saat membuka website.

---

## 📁 Struktur Folder Utama
- `pages/` → Berisi halaman kategori & detail produk
- `command/` → Script parsing & database
- `partials/` → File layout (header, footer, dsb)
- `assets/` → Gambar, CSS, dan JavaScript
- `command/databases/affiliate_link.db` → Database utama produk
- `index.php` → Halaman utama toko

---

# 📱 Tutorial: Upload Proyek dari GitHub ke AwardSpace (Cocok untuk Pengguna HP)

Tutorial ini cocok untuk kamu yang:
- Menggunakan HP Android atau iOS
- Tidak ingin install aplikasi tambahan
- Ingin menjalankan proyek PHP langsung di hosting publik

---

## 🚀 Langkah-langkah Upload Proyek dari GitHub ke AwardSpace

### 1. Daftar Akun di AwardSpace
1. Kunjungi [https://www.awardspace.com](https://www.awardspace.com) lalu daftar akun gratis.
2. Verifikasi email dan login ke member area.

---

### 2. Buat Domain Gratis
1. Di dashboard, klik **Hosting Tools** → **Domain Manager**.
2. Pilih tab **Free Subdomain**.
3. Buat nama domain sesuai keinginan kamu, misalnya: `zhstore.awardspace.info`.

---

### 3. Akses File Manager
1. Kembali ke dashboard, buka menu **File Manager**.
2. Masuk ke folder `htdocs` dari domain kamu.
3. Hapus file default (seperti `index.html` kalau ada).

---

### 4. Upload Proyek dari GitHub
**Dua metode yang bisa kamu pilih:**

#### 🔹 Metode A: Download ZIP
1. Buka link GitHub repo kamu → klik tombol `Code` → pilih `Download ZIP`.
2. Upload file ZIP ke `htdocs` di File Manager AwardSpace.
3. Ekstrak file ZIP → pastikan `index.php` dan semua folder ada di dalam `htdocs`.

#### 🔹 Metode B: Upload Manual via File Manager
1. Upload semua file satu per satu atau per folder langsung dari HP kamu.
2. Pastikan struktur folder seperti ini:

htdocs/ ├── index.php ├── pages/ ├── partials/ ├── assets/ ├── command/

---

### 5. Cek Website Kamu
1. Kembali ke dashboard AwardSpace.
2. Klik nama domain/subdomain kamu.
3. Website akan tampil! 🎉

---

### ✅ Tips Tambahan
- Kompres gambar menjadi `.webp` untuk loading lebih cepat.
- Hosting gratis seperti AwardSpace punya limit bandwidth 5GB/bulan. Gunakan dengan bijak.
- Aktifkan cache browser dengan menambahkan versi otomatis pada file JS/CSS.

---

## 🔗 Contoh Live Preview
`https://zhstore.awardspace.info`

---

Tutorial ini dibuat **khusus untuk pengguna HP** agar bisa langsung praktek tanpa aplikasi tambahan seperti Termux. Semoga bermanfaat dan selamat mencoba!