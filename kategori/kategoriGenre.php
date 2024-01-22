<?php
include_once '../config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $namaKategori = $_POST['namaKategori'];

    // Insert data into kategoriBuku table
    $insertSql = "INSERT INTO kategoriBuku (namaKategori) VALUES ('$namaKategori')";
    
    if (mysqli_query($koneksi, $insertSql)) {
        header("Location: kategori.php"); // Redirect to kategori.php after successful insertion
        exit();
    } else {
        $error = "Error: " . $insertSql . "<br>" . mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once '../navigation/sidebar.php';
    ?>

    <div id="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="kategori.php"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="kategoriTambah.php">Kategori</a> </li>
            </ol>
        </nav>
        <section id="tambahKategori">
            <div class="container mt-5">
                <h2 class="mb-4">Tambah Kategori Buku</h2>
                <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori:</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-4   ">Tambah Kategori</button>
                </form>
            </div>
        </section>
    </div>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php mysqli_close($koneksi); ?>