<?php
// like.php
include_once '../config.php';
// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari request AJAX
$bukuID = $_POST['ulasanID'];

// Simpan data ke database (tabel like)
$sql = "INSERT INTO ulasanBuku (userID, bukuID) VALUES ('$bukuID')";
if ($conn->query($sql) === TRUE) {
    echo "Like berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>