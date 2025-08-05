<?php
$db = new SQLite3('./databases/gpt.db');

$id     = $_POST["kode"];
$judul   = $_POST["judul"];
$prompt_text = $_POST["prompt"];
$kategori = $_POST["kateg"];
$link_img  = $_POST["url"];

// Gunakan prepared statement agar aman dari SQL injection
$stmt = $db->prepare("UPDATE prompt SET judul = :judul, prompt_text = :prompt_text, kategori = :kategori, link_img = :link_img WHERE id = $id");

$stmt->bindValue(':judul', $judul, SQLITE3_TEXT);
$stmt->bindValue(':prompt_text', $prompt_text, SQLITE3_TEXT);
$stmt->bindValue(':kategori', $kategori, SQLITE3_TEXT);
$stmt->bindValue(':link_img', $link_img, SQLITE3_TEXT);
$result = $stmt->execute();

if ($result) {
    echo "<script>location.href = '../';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data'); location.href = '#';</script>";
}
?>