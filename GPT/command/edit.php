<?php
  $id = $_GET["kode"];
  $db = new SQLite3('./databases/gpt.db');
  $sql = "SELECT * FROM prompt WHERE id = $id";
?>
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
    <?php
      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    ?>
    <section>
      <div class="form-box">
        <div class="form-value">
          <?php include_once 'opsidata.php';?>
          <form method="POST" action="./aksiedit.php">
            <h2>Edit Data</h2>
            <div class="inputbox">
              <p><strong>Judul</strong></p>
              <input type="text" name="kode" value="<?php echo $row['id'];?>" hidden>
              <input type="text" name="judul" value="<?php echo $row['judul'];?>"/>
            </div>
            <div class="inputbox">
              <p><b>Prompt Text</b></p>
              <textarea name="prompt"><?php echo $row['prompt_text'];?></textarea>
            </div>
            <div class="inputbox">
              <p><strong>Kategori</strong></p>
              <select name="kateg" required>
                <?php
                foreach ($opsiserver as $tipeserver) {
                  $terpilih = ($row['server'] == $tipeserver) ? 'selected' : '';
                  echo "<option value=\"$tipeserver\" $terpilih>$tipeserver</option>";
                }
                ?>
              </select>
            </div>
            <div class="inputbox">
              <p><b>Link Gambar</b></p>
              <input name="url" type="text" value="<?php echo $row['link_img'];?>" required>
            </div>
            <button class="simpan">Update</button>
          </form>
        </div>
      </div>
    </section>
    <?php } ?>
  </body>
</html>