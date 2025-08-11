<?php
  $baseDir = realpath(__DIR__. '/../../');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - Hutan Pelangi</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header ini sama persis dengan halaman utama untuk konsistensi -->
    <header>
        <div class="container">
            <div class="logo">ZHStore.<br>E-book Cerita Anak</div>
            <!-- Anda bisa menambahkan link ke katalog di sini nanti -->
            <a href="/" class="cta-button-header">Kembali ke Beranda</a>
        </div>
    </header>

    <main>
        <section class="katalog">
            <div class="container">
                <h2>Koleksi Buku Cerita Kami</h2>
                <div class="katalog-grid">

                    <!-- ================================== -->
                    <!--     MULAI BLOK PRODUK (Untuk PHP Loop)     -->
                    <!-- ================================== -->
                    <div class="buku-item">
                        <!-- Ganti dengan URL gambar cover buku Anda -->
                        <img src="https://via.placeholder.com/300x400/FFC3A0/5C4B51?text=Cover+Buku+1" alt="Cover E-book Petualangan di Hutan Pelangi">
                        <h3>Petualangan di Hutan Pelangi</h3>
                        <p>Ikuti petualangan seru Kiki si Kelinci dan Popo si Beruang dalam mencari madu ajaib!</p>
                        <div class="harga-buku">Rp 49.000</div>
                        <a href="index.html" class="cta-button-katalog">Lihat Detail</a>
                    </div>
                    <!-- ================================== -->
                    <!--      AKHIR BLOK PRODUK     -->
                    <!-- ================================== -->

                    <!-- Ini adalah contoh buku kedua. Strukturnya sama persis. -->
                    <div class="buku-item">
                         <!-- Ganti dengan URL gambar cover buku Anda -->
                        <img src="https://via.placeholder.com/300x400/A0C4FF/5C4B51?text=Cover+Buku+2" alt="Cover E-book Petualangan Bintang Jatuh">
                        <h3>Petualangan Bintang Jatuh</h3>
                        <p>Kisah seekor rubah kecil yang baik hati berusaha membantu sebuah bintang kembali ke langit malam.</p>
                        <div class="harga-buku">Rp 52.000</div>
                        <a href="#" class="cta-button-katalog">Lihat Detail</a>
                    </div>

                    <!-- Anda bisa menambahkan lebih banyak buku di sini dengan menyalin blok di atas -->

                </div>
            </div>
        </section>
    </main>

    <!-- Footer ini juga sama persis dengan halaman utama -->
    <footer class="footer-katalog">
        <div class="container">
            <p class="logo-footer">Hutan Pelangi</p>
            <p>&copy; 2025 E-book Hutan Pelangi. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>