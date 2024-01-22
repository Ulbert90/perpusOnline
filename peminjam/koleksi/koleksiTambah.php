<?php
// Pastikan sesuai dengan informasi koneksi database Anda
$host = "localhost";
$username = "root";
$password = "root";
$database = "APD";

// Buat koneksi ke database
$mysqli = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Tangkap data bukuID dari permintaan POST
$bukuID = $_POST['bukuID'];

// Lakukan operasi penambahan buku ke koleksi di sini

// Tutup koneksi database
$mysqli->close();
?>