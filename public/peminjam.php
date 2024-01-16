<?php
include_once '../koneksi.php'; // Pastikan ini sesuai dengan nama file koneksi Anda
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpus Digital</title>
    <style>
    .book-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .book-card {
        width: calc(33.33% - 1rem);
        /* 1rem untuk memberikan jarak antar buku */
        margin-bottom: 3rem;
    }
    </style>
</head>

<body>
    <?php
    include_once '../modal/navbar.php';
    $query = "SELECT b.*, u.ulasan, u.rating
              FROM buku AS b
              LEFT JOIN ulasanBuku AS u ON b.bukuID = u.bukuID";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<div class="book-container">';
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="card book-card" style="width: 18rem;">
        <img src="<?php echo $row['coverBuku']; ?>" class="card-img-top" alt="...">
        <div class="card-title"><?php echo $row['judul']; ?></div>
        <div class="card-body">
            <h5><?php echo $row['penulis']; ?></h5>
            <p class="card-text"><?php echo $row['ulasan']; ?></p>
            <p class="card-text"><?php echo $row['rating']; ?></p>
            <p class="card-text"><?php echo $row['tahunTerbit']; ?></p>
        </div>
    </div>
    <?php
        }
        echo '</div>'; // Menutup book-container
    } else {
        echo 'Error executing query: ' . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>