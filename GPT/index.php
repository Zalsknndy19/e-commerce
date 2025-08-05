<?php
  $admpg = new SQLite3('./command/databases/gpt.db');
  $no = 1;
  $sql = 'SELECT * from prompt';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilan Database Master</title>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="../img/fav.png" type="image/x-icon">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
  </head>
  <body>
      <img id="logo" width="15%" src="../img/logo.png" alt=""></a>
    <h1>Halaman Admin Untuk Atur Data Prompt</h1>
    <button onclick="document.location='./command/tambah.php'">Tambah Data</button>
    <table>
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Prompt</th>
        <th>Preview Gambar</th>
        <th>Tersalin</th>
        <th>Aksi</th>
      </tr>
      <?php
      $ret = $admpg->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ) { ?>
      <tr>
        <td><?php echo $no++; ?>.</td>
        <td><?php echo $row['judul']; ?></td>
        <td><?php echo $row['kategori']; ?></td>
        <td><?php echo substr($row['prompt_text'],0,30); ?></td>
        <td><img style="width:80%;" src="https://res.cloudinary.com/dii1gyt4o/image/upload/w_600/q_auto/<?php echo $row['link_img'];?>" alt="Foto <?php echo $row['judul'];?>"></td>
        <td><?php echo $row['counter_copy'];?>×</td>
        <td>
          <button class="btn btn-warning btn-sm" onclick="document.location='./command/edit.php?kode=<?php echo $row['id'] ?>'"><i class="fas fa-pen"></i> Edit</button>
          <a href="./command/del.php?kode=<? echo $row['id'] ?>" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
           <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
          </a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>