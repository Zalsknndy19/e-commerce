# 💼 ZHStore - Template E-Commerce Gratis

ZHStore adalah template e-commerce PHP ringan dengan tampilan modern dan fitur parsing otomatis dari TikTok Shop. Cocok untuk dijalankan di hosting gratis seperti ProFreeHost, InfinityFree, atau Replit. Dalam tutorial ini, saya menggunakan ProFreeHost karena waktu propagasi domainnya cenderung lebih cepat dibanding alternatif lain.

---

## 🎁 Apa yang Kamu Dapatkan?

Template e-commerce ini sudah dilengkapi dengan:
- ✅ Halaman dinamis berbasis PHP
- ✅ File database SQLite yang sudah berisi data produk (siap pakai)
- ✅ Desain responsif dan ringan untuk HP
- ✅ Cocok untuk hosting gratis tanpa perlu aplikasi tambahan

---

## 📌 Penting!
- File `affiliate_link.db` adalah database yang sudah diisi produk.
- Jangan hapus file ini jika ingin langsung melihat contoh produk saat membuka website.

## 📁 Struktur Folder Utama
- `pages/` → Berisi halaman kategori & detail produk
- `command/` → Script parsing & database
- `partials/` → File layout (header, footer, dsb)
- `assets/` → Gambar, CSS, dan JavaScript
- `command/databases/affiliate_link.db` → Database utama produk, silahkan diganti aja isinya sesuai kebutuhan.
- `index.php` → Halaman utama toko

---

# 📱 Tutorial: Upload ke Hosting Gratis ProFreeHost (Versi Mobile Friendly)

Tutorial ini cocok untuk kamu yang:
- Menggunakan HP Android atau iOS
- Tidak ingin install aplikasi tambahan
- Ingin menjalankan proyek PHP langsung di hosting

---

## 🚀 Langkah-langkah Upload Proyek ke ProFreeHost

### 🔧 Persiapan
1. Buat akun gratis di [https://profreehost.com](https://profreehost.com)
2. Aktivasi domain dan hosting
3. Masuk ke Control Panel → File Manager

---

### 📸 Ikuti tutorial bergambar berikut (Swipe atau scroll ke bawah):

#### 🖼 Step 1
- Klik tombol Code (warna hijau) lalu klik download agar file-nya siap digunakan di step berikutnya.
![Step 1](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step1.jpg)

#### 🖼 Step 2
- Buka [https://profreehost.com](https://profreehost.com) untuk membuat akun hosting gratis.
- Setelah terbuka, klik tombol Register Now, lalu isi kolom email dengan email kalian dan isi kolom password sesuai keinginan. Gunakan kombinasi yang mudah diingat agar tidak lupa saat login kembali.
- Setelah berhasil buat akun dan masuk, klik tombol + Create New Account, lalu isi kolom domain (isinya bebas terserah kalian), saya disini pake (sub)domain zhstore, lalu klik tombol centang untuk melanjutkan (biasanya harus nunggu beberapa menit sampai (sub)domain kita aktif).
![Step 2](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step2.jpg)

#### 🖼 Step 3
- Jika (sub)domain sudah aktif biasanya akan tampil seperti gambar kiri, coba copy linknya lalu buka di tab baru, jika tampilannya seperti gambar kanan maka Website nya sudah siap untuk ditambahkan template yang ini.
![Step 3](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step3.jpg)

#### 🖼 Step 4
- Kembali ke halaman sebelumnya lalu klik tombol Manage, tujuannya hanya untuk mengambil informasi ftp agar nantinya memudahkan proses upload file template ini.
- Jika muncul halaman important notice klik aja "I Approve".
- Setelah masuk pilih tab FTP untuk melihat informasi username, password(klik Show/Hide untuk melihat) dan host, catat/salin informasi ini.
![Step 4](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step4.jpg)

#### 🖼 Step 5
- Jika belum ada aplikasi File Manager yang support FTP, download salah satu file ini.
- [File Manager Plus (Rekomendasi, tutorial sekarang juga pake aplikasi ini)](https://play.google.com/store/apps/details?id=com.alphainventor.filemanager)
- [X-Plore (Bagus buat FTP tapi agak susah untuk yang awam)](https://play.google.com/store/apps/details?id=com.lonelycatgames.Xplore)
- [EX File Manager (Belum pernah pake tapi katanya bagus juga)](https://play.google.com/store/apps/details?id=com.ace.ex.file.manager)
- Jika File Manager udah terinstal maka lanjutkan ke step 5, buka aplikasi File Manager Plus (jika ada permintaan perizinan tinggal izinkan saja), Pilih Remote agar bisa mengakses storage hosting yang tadi dibuat, klik "Add a remote connection", pilih FTP lalu isi dengan informasi FTP di step 4, Host dengan FTP Hostname, Username dengan FTP Username, Password dengan FTP Password, setelah itu klik OK.
- Setelah berhasil masuk ke Storage Hostingnya klik tombol menu di pojok kiri atas lalu pilih Main Storage lalu cari folder Download (atau langsung aja klik Home lalu pilih Downloads), cari file `e-commerce-main.zip`
![Step 5](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step5.jpg)

#### 🖼 Step 6
- Setelah ketemu extract file tersebut (lihat gambar).
- Setelah selesai extract buka folder `e-commerce-main` lalu klik lama di salah satu file/folder kemudian klik tombol kotak di pojok kanan atas untuk menandai semua file.
- Klik Move (lebih disarankan Copy sih biar nantinya database bisa di ubah jadi sesuai keinginan sendiri), lalu klik Menu dan pilih yang ftpupload.net lalu masuk ke folder htdocs lalu klik tombol Paste/Tempel dan tunggu sampai proses selesai.
- Harap bersabar kalo proses salin/pindah agak lama dikarenakan itu emang dari pihak hosting gratisnya bukan masalah koneksi internet kalian.
![Step 6](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step6.jpg)

#### 🖼 Step 7
- Setelah Proses Upload file selesai coba buka kembali domain (di step 2) dan refresh browser, jika tampilannya berubah maka proses upload template website ZHStore telah selesai 🎉🎉🎉. Tinggal edit database pake aplikasi [SQLite Editor](https://www.mediafire.com/file/r75arws3cx9soxc/SQLite+Editor+[2.6.3].apk/file).
- Jika tampilannya tidak berubah atau muncul error, pastikan semua file berhasil di-upload, terutama index.php dan file database di command/databases/.

![Step 7](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step7.jpg)

#### 🛠 Step 8
- Coming soon, tutorial kosongkan semua isi di database dan menggantinya dengan data kalian, mengubah title atau logo, ditunggu aja kelanjutannya ya atau kalau mau ubah sendiri pun silahkan.

---

### ✅ Tips Tambahan
- Pastikan file utama adalah `index.php`.
- File database `affiliate_link.db` jangan dihapus.
- Website bisa langsung diakses publik setelah upload selesai.

---

### 🌐 Contoh Link Website (setelah berhasil dihosting)
- Yang ingin lihat hasil akhirnya [Versi ProFreeHost](https://zhstore.liveblog365.com) atau [Versi VPS](https://store.zhwifi.web.id)

---

> 📌 Tampilan template ini dioptimalkan untuk pengguna HP. Jika dibuka di desktop, tampilannya mungkin tidak sebaik versi mobile karena seluruh proses pembuatan dilakukan di Android menggunakan Acode dan Magisk Module php webserver (HP harus sudah di root).

---

☕ Dukung dan Ikuti Saya

Jika kamu merasa template ini bermanfaat, dukung saya atau ikuti saya di sosial media berikut ini:

💸 Saweria - [zalsknndy19](https://saweria.co/zalsknndy19)

🎵 TikTok - [zalsknndy1901](https://www.tiktok.com/@zalsknndy1901)

📷 Instagram - [zalsknndy1901](https://www.instagram.com/zalsknndy1901)

📘 Facebook - [zalsknndy19](https://www.facebook.com/zalsknndy19)


> 🎯 Jangan lupa follow Sosmed saya ya! Konten menarik seputar coding, tutorial, dan teknologi akan dibagikan secara rutin. Yuk follow sekarang 😄

