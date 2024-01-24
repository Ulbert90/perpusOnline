<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaKategori = isset($_POST["namaKategori"]) ? $_POST["namaKategori"] : null;
    
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["filePDF"]["name"]);
    $uploadOk = 1;
    $filePDFType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validate file type
    if ($filePDFType != "pdf") {
        echo "Hanya file PDF yang diizinkan.";
        $uploadOk = 0;
    }

    // Check file size (adjust the limit as needed)
    $maxFileSize = 5 * 1024 * 1024; // 5 MB
    if ($_FILES["filePDF"]["size"] > $maxFileSize) {
        echo "Ukuran file terlalu besar. Maksimum " . $maxFileSize / (1024 * 1024) . " MB diizinkan.";
        $uploadOk = 0;
    }

    // Check if file already exists and generate a unique name if needed
    if (file_exists($targetFile)) {
        $uniqueFileName = uniqid() . "_" . basename($_FILES["filePDF"]["name"]);
        $targetFile = $targetDirectory . $uniqueFileName;
    }

    // Process file upload and insert into the database
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["filePDF"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $query = "INSERT INTO kategoriBuku (namaKategori, filePDF) VALUES ('$namaKategori', '$targetFile')";
            
            if (mysqli_query($koneksi, $query)) {
                echo "Data kategori berhasil ditambahkan.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "File Anda tidak berhasil diunggah.";
    }
}

mysqli_close($koneksi);
?>