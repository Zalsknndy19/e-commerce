<?php
$no = 1;
function potong_title($title_cut, $maks = 50) {
    if (mb_strlen($title_cut, 'UTF-8') > $maks) {
        return mb_substr($title_cut, 0, $maks, 'UTF-8') . '...';
    } else {
        return $title_cut;
    }
}

function formatJumlah($angka) {
    if ($angka >= 1000000) {
        return round($angka / 1000000, 1) . ' jt';
    } elseif ($angka >= 1000) {
        return round($angka / 1000, 1) . ' rb';
    } else {
        return $angka;
    }
}

function ratingSemua($jumlah_pembelian) {
    if ($jumlah_pembelian >= 10000) {
        return rand(47, 50) / 10; // 4.7 - 5.0
    } elseif ($jumlah_pembelian >= 1000) {
        return rand(45, 48) / 10; // 4.5 - 4.8
    } elseif ($jumlah_pembelian >= 100) {
        return rand(40, 46) / 10; // 4.0 - 4.6
    } else {
        return rand(38, 42) / 10; // 3.8 - 4.2
    }
}
?>