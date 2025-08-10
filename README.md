# ZHStore - Studi Kasus & Portofolio Platform E-Commerce dengan PHP Native

**[Lihat Demo Langsung (VPS)](https://store.zhwifi.web.id) | [Lihat Demo Alternatif (Hosting Gratis)](https://zhstore.liveblog365.com)**

Selamat datang di repository ZHStore! Proyek ini bukan sekadar template, melainkan sebuah **studi kasus lengkap** tentang bagaimana membangun platform e-commerce fungsional dari nol menggunakan PHP native. Proyek ini dirancang dengan fokus pada performa, SEO, arsitektur kode yang bersih, dan kemudahan deployment.

---

## 💼 Butuh Website Serupa? Saya Bisa Bantu! (Hire Me)

Apakah Anda pemilik UMKM, kreator konten, atau pebisnis yang membutuhkan website profesional untuk menjual produk Anda? Saya menyediakan jasa pembuatan website kustom berdasarkan arsitektur solid yang ada di proyek ini.

**Layanan yang saya tawarkan:**
*   Pembuatan Toko Online & Landing Page Kustom
*   Setup Website Affiliate & Produk Digital
*   Perbaikan Tampilan (CSS) & Desain Responsif
*   Optimasi Kecepatan & SEO Teknis

Mari wujudkan ide Anda menjadi kenyataan. Hubungi saya untuk diskusi santai (dan gratis) mengenai proyek Anda:

*   **Email:** [assistant@zhwifi.web.id](mailto:assistant@zhwifi.web.id)
*   **WhatsApp:** [+62 878-5906-7276](https://wa.me/6287859067276)

---

### Fitur Unggulan & Teknis

*   **Arsitektur Template Kustom:** Menggunakan `partials` untuk header, footer, dan head yang bisa digunakan kembali, membuat kode tetap DRY (Don't Repeat Yourself).
*   **SEO Teknis Tingkat Lanjut:** Title, meta description, dan **canonical URL** dihasilkan secara dinamis untuk setiap halaman.
*   **Sistem Cache-Busting Otomatis:** Versi file CSS dan JS diperbarui secara otomatis untuk memastikan pengguna selalu mendapatkan versi terbaru.
*   **Clean URLs:** Menggunakan `.htaccess` untuk URL yang ramah SEO dan profesional.
*   **Sistem Sadar Lingkungan (Environment-Aware):** Kode secara otomatis beradaptasi antara lingkungan development lokal dan server produksi.
*   **Backend:** PHP (Native) | **Database:** SQLite | **Frontend:** HTML5, CSS3, JS

---
<details>
<summary><b>[KLIK DI SINI] 🚀 Ingin Mencoba Template Ini Sendiri? Ikuti Tutorial Gratis di Bawah Ini!</b></summary>
<br>

### 🎁 Apa yang Kamu Dapatkan?

Template e-commerce ini sudah dilengkapi dengan:
- ✅ Halaman dinamis berbasis PHP
- ✅ File database SQLite yang sudah berisi data produk (siap pakai)
- ✅ Desain responsif dan ringan untuk HP
- ✅ Cocok untuk hosting gratis tanpa perlu aplikasi tambahan

---

### 📌 Penting!
- File `affiliate_link.db` adalah database yang sudah diisi produk.
- Jangan hapus file ini jika ingin langsung melihat contoh produk saat membuka website.

### 📁 Struktur Folder Utama
- `pages/` → Berisi halaman kategori & detail produk
- `command/` → Script parsing & database
- `partials/` → File layout (header, footer, dsb)
- `assets/` → Gambar, CSS, dan JavaScript
- `command/databases/affiliate_link.db` → Database utama produk, silahkan diganti aja isinya sesuai kebutuhan.
- `index.php` → Halaman utama toko

---

### 📱 Tutorial: Upload ke Hosting Gratis ProFreeHost (Versi Mobile Friendly)

Tutorial ini cocok untuk kamu yang:
- Menggunakan HP Android atau iOS
- Tidak ingin install aplikasi tambahan
- Ingin menjalankan proyek PHP langsung di hosting

---

#### 🚀 Langkah-langkah Upload Proyek ke ProFreeHost

##### 🔧 Persiapan
1. Buat akun gratis di [https://profreehost.com](https://profreehost.com)
2. Aktivasi domain dan hosting
3. Masuk ke Control Panel → File Manager

---

##### 📸 Ikuti tutorial bergambar berikut (Swipe atau scroll ke bawah):

**🖼 Step 1**
- Klik tombol Code (warna hijau) lalu klik download agar file-nya siap digunakan di step berikutnya.
![Step 1](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step1.jpg)

**🖼 Step 2**
- Buka [https://profreehost.com](https://profreehost.com) untuk membuat akun hosting gratis.
- Setelah terbuka, klik tombol Register Now, lalu isi kolom email dengan email kalian dan isi kolom password sesuai keinginan. Gunakan kombinasi yang mudah diingat agar tidak lupa saat login kembali.
- Setelah berhasil buat akun dan masuk, klik tombol + Create New Account, lalu isi kolom domain (isinya bebas terserah kalian), saya disini pake (sub)domain zhstore, lalu klik tombol centang untuk melanjutkan (biasanya harus nunggu beberapa menit sampai (sub)domain kita aktif).
![Step 2](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step2.jpg)

**🖼 Step 3**
- Jika (sub)domain sudah aktif biasanya akan tampil seperti gambar kiri, coba copy linknya lalu buka di tab baru, jika tampilannya seperti gambar kanan maka Website nya sudah siap untuk ditambahkan template yang ini.
![Step 3](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step3.jpg)

**🖼 Step 4**
- Kembali ke halaman sebelumnya lalu klik tombol Manage, tujuannya hanya untuk mengambil informasi ftp agar nantinya memudahkan proses upload file template ini.
- Jika muncul halaman important notice klik aja "I Approve".
- Setelah masuk pilih tab FTP untuk melihat informasi username, password(klik Show/Hide untuk melihat) dan host, catat/salin informasi ini.
![Step 4](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step4.jpg)

**🖼 Step 5**
- Jika belum ada aplikasi File Manager yang support FTP, download salah satu file ini.
- [File Manager Plus (Rekomendasi, tutorial sekarang juga pake aplikasi ini)](https://play.google.com/store/apps/details?id=com.alphainventor.filemanager)
- [X-Plore (Bagus buat FTP tapi agak susah untuk yang awam)](https://play.google.com/store/apps/details?id=com.lonelycatgames.Xplore)
- [EX File Manager (Belum pernah pake tapi katanya bagus juga)](https://play.google.com/store/apps/details?id=com.ace.ex.file.manager)
- Jika File Manager udah terinstal maka lanjutkan ke step 5, buka aplikasi File Manager Plus (jika ada permintaan perizinan tinggal izinkan saja), Pilih Remote agar bisa mengakses storage hosting yang tadi dibuat, klik "Add a remote connection", pilih FTP lalu isi dengan informasi FTP di step 4, Host dengan FTP Hostname, Username dengan FTP Username, Password dengan FTP Password, setelah itu klik OK.
- Setelah berhasil masuk ke Storage Hostingnya klik tombol menu di pojok kiri atas lalu pilih Main Storage lalu cari folder Download (atau langsung aja klik Home lalu pilih Downloads), cari file `e-commerce-main.zip`
![Step 5](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step5.jpg)

**🖼 Step 6**
- Setelah ketemu extract file tersebut (lihat gambar).
- Setelah selesai extract buka folder `e-commerce-main` lalu klik lama di salah satu file/folder kemudian klik tombol kotak di pojok kanan atas untuk menandai semua file.
- Klik Move (lebih disarankan Copy sih biar nantinya database bisa di ubah jadi sesuai keinginan sendiri), lalu klik Menu dan pilih yang ftpupload.net lalu masuk ke folder htdocs lalu klik tombol Paste/Tempel dan tunggu sampai proses selesai.
- Harap bersabar kalo proses salin/pindah agak lama dikarenakan itu emang dari pihak hosting gratisnya bukan masalah koneksi internet kalian.
![Step 6](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step6.jpg)

**🖼 Step 7**
- Setelah Proses Upload file selesai coba buka kembali domain (di step 2) dan refresh browser, jika tampilannya berubah maka proses upload template website ZHStore telah selesai 🎉🎉🎉. Tinggal edit database pake aplikasi [SQLite Editor](https://www.mediafire.com/file/r75arws3cx9soxc/SQLite+Editor+[2.6.3].apk/file).
- Jika tampilannya tidak berubah atau muncul error, pastikan semua file berhasil di-upload, terutama index.php dan file database di command/databases/.
![Step 7](https://raw.githubusercontent.com/Zalsknndy19/e-commerce-assets/main/tutorial/step7.jpg)

**🛠 Step 8**
- Coming soon, tutorial kosongkan semua isi di database dan menggantinya dengan data kalian, mengubah title atau logo, ditunggu aja kelanjutannya ya atau kalau mau ubah sendiri pun silahkan.

> 📌 Tampilan template ini dioptimalkan untuk pengguna HP. Jika dibuka di desktop, tampilannya mungkin tidak sebaik versi mobile karena seluruh proses pembuatan dilakukan di Android. Proses perbaikan tampilan desktop sedang berjalan.

</details>

---

### ☕ Dukung Proyek Ini

Jika Anda merasa proyek atau tutorial ini bermanfaat, pertimbangkan untuk mendukung saya agar bisa terus berkarya:

💸 **Saweria:** [zalsknndy19](https://saweria.co/zalsknndy19)

### Ikuti Perjalanan Saya

Dapatkan konten menarik seputar coding, tutorial, dan teknologi secara rutin.

🎵 **TikTok:** [zalsknndy1901](https://www.tiktok.com/@zalsknndy1901) | 📷 **Instagram:** [zalsknndy1901](https://www.instagram.com/zalsknndy1901) | 📘 **Facebook:** [zalsknndy19](https://www.facebook.com/zalsknndy19)