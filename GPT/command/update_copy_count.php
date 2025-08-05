<?php
header('Content-Type: application/json');

// Koneksi ke database
$db = new SQLite3('./databases/gpt.db');

// Ambil ID dari request (GET/POST keduanya bisa)
$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;

if ($id > 0) {
    // Cek apakah ID valid di tabel prompt
    $check = $db->querySingle("SELECT COUNT(*) FROM prompt WHERE id = $id");
    if ($check > 0) {
        // Update counter
        $stmt = $db->prepare("UPDATE prompt SET counter_copy = COALESCE(counter_copy, 0) + 1 WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'not_found']);
    }
} else {
    echo json_encode(['status' => 'invalid_id']);
}
?>