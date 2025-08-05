<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilan Database Master</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="img/fav.png" type="image/x-icon">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../../css/style.css"/>
  </head>
  <body>
    <section>
      <div class="form-box">
        <div class="form-value">
          <form method="POST" action="./aksitambah.php">
            <h2>Isi Data Prompt</h2>
            <?php include_once 'opsidata.php';?>
            <div class="inputbox">
              <p><strong>Judul</strong></p>
              <input type="text" name="judul" placeholder="Masukkan Judul"/>
            </div>
            <div class="inputbox">
              <p><b>Prompt Text</b></p>
              <textarea name="prompt" placeholder="Masukkan teks prompt"></textarea>
            </div>
            <div class="inputbox">
              <p><strong>Kategori</strong></p>
              <select name="kateg" required>
                <option value="">Pilih Kategori</option>
                <?php
                foreach ($opsiserver as $tipeserver){ ?>
                <option value="<?php echo $tipeserver;?>"><?php echo $tipeserver;?></option>
                <?php }?>
              </select>
            </div>
            <div class="inputbox">
              <p><b>Link Gambar Preview</b></p>
              <input name="url" type="text" placeholder="Hanya masukkan path terakhir" required>
            </div>
            <button class="simpan">Simpan</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>