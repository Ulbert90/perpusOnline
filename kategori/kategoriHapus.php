<?php
// File: kategorihapus.php

// Include file koneksi database
include "../config.php"; // Gantilah dengan nama file koneksi yang sesuai

// Ambil nilai kategoriBukuID dari parameter GET
if (isset($_GET['kategoriBukuID'])) {
    $kategoriBukuID = $_GET['kategoriBukuID'];

    // Persiapkan query SQL untuk menghapus data berdasarkan kategoriBukuID
    $query = "DELETE FROM kategoriBuku_relasi WHERE kategoriBukuID = $kategoriBukuID";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Data kategori berhasil dihapus.";
        header("location: kategori.php");
    } else {
        echo "Gagal menghapus data kategori: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    echo "KategoriBukuID tidak valid.";
}
?>