<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    // Ensure that 'tahunTerbit' is an integer
    $tahunTerbit = (int)$_POST['tahunTerbit'];

    // Process file upload
    $target_dir = "../img/";  // Specify your upload directory
    $target_file = $target_dir . basename($_FILES["coverBuku"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the directory exists, if not, create it
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["coverBuku"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (max 5MB)
    if ($_FILES["coverBuku"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, your file was not uploaded.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, there was an error uploading your file.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["coverBuku"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now insert data into the database
            $coverBuku = $target_file;

            // Insert data into the database using prepared statement
            $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (judul, penulis, penerbit, tahunTerbit, coverBuku) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssis", $judul, $penulis, $penerbit, $tahunTerbit, $coverBuku);

            if (mysqli_stmt_execute($stmt)) {
                header("location: data_buku.php");
            } else {
                echo "Sorry, there was an error inserting data into the database.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>