<?php
$addpg = new SQLite3('./databases/gpt.db');

$judul = $_POST['judul'];
$prompt_text = $_POST['prompt'];
$kategori = $_POST['kateg'];
$url = $_POST['url'];

$stmt = $addpg->prepare("INSERT INTO prompt (judul, prompt_text, kategori, link_img) VALUES (:judul, :prompt_text, :kategori, :url)");
$stmt->bindValue(':judul', $judul, SQLITE3_TEXT);
$stmt->bindValue(':prompt_text', $prompt_text, SQLITE3_TEXT);
$stmt->bindValue(':kategori', $kategori, SQLITE3_TEXT);
$stmt->bindValue(':url', $url, SQLITE3_TEXT);
$result = $stmt->execute();

if ($result) {
    echo "<script>location.href = '..';</script>";
} else {
    echo "<script>alert('Gagal menambah data'); location.href = '#';</script>";
}

?>
