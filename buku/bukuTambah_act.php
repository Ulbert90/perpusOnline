<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];

    // Process file upload
    $target_dir = "img/";  // Specify your upload directory
    $target_file = $target_dir . basename($_FILES["coverBuku"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["coverBuku"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (max 5MB)
    if ($_FILES["coverBuku"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["coverBuku"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now insert data into the database
            $coverBuku = $target_file;

            mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, penerbit, tahunTerbit, coverBuku) VALUES ('$judul','$penulis', '$penerbit' ,'$tahunTerbit', '$coverBuku')"); 
            header("location: buku.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>