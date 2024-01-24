<?php

// Koneksi database
include '../config.php';

// Validasi input
if (empty($_POST['namaKategori'])) {
  echo "Nama kategori harus diisi!";
  exit;
}

// Jika ada file PDF yang diupload
if (isset($_FILES['filePDF']['name'])) {

  // Ambil nama file PDF
  $namaFilePDF = $_FILES['filePDF']['name'];

  // Ambil judul file PDF
  $judulFilePDF = $_POST['judulFilePDF'];

  // Pindahkan file PDF ke folder tujuan
  move_uploaded_file($_FILES['filePDF']['tmp_name'], 'assets/pdf/' . $namaFilePDF);

  // Tambah data ke database
  $query = "INSERT INTO kategoriBuku (namaKategori, namaFilePDF, judulFilePDF) VALUES ('" . $_POST['namaKategori'] . "', '" . $namaFilePDF . "', '" . $judulFilePDF . "')";
  $result = mysqli_query($conn, $query);

  // Cek hasil query
  if ($result) {
    echo "Data berhasil ditambahkan!";
  } else {
    echo "Data gagal ditambahkan!";
  }
}

// Tutup koneksi database
mysqli_close($conn);

?>