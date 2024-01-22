<?php
include_once '../config.php';

// Fetch data for dropdowns
$sqlBuku = "SELECT * FROM buku";
$resultBuku = mysqli_query($koneksi, $sqlBuku);

$sqlKategori = "SELECT * FROM kategoriBuku";
$resultKategori = mysqli_query($koneksi, $sqlKategori);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $bukuID = $_POST['bukuID'];
    $kategoriID = $_POST['kategoriID'];

    // Insert data into kategoriBuku_relasi table
    $insertSql = "INSERT INTO kategoriBuku_relasi (bukuID, kategoriID) VALUES ('$bukuID', '$kategoriID')";
    
    if (mysqli_query($koneksi, $insertSql)) {
        header("Location: kategori.php"); // Redirect to kategoriBuku_relasi.php after successful insertion
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
    <title>Tambah Kategori Buku Relasi</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/dasboard.css">
</head>

<body>
    <?php include_once '../navigation/sidebar.php'; ?>

    <div id="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="kategori.php">Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Buku Relasi</li>
            </ol>
        </nav>
        <section id="tambahKategoriBukuRelasi">
            <div class="container mt-5">
                <h2 class="mb-4">Tambah Kategori Buku Relasi</h2>
                <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="bukuID">Buku:</label>
                        <select class="form-control" id="bukuID" name="bukuID" required>
                            <?php while ($rowBuku = mysqli_fetch_assoc($resultBuku)) : ?>
                            <option value="<?php echo $rowBuku['bukuID']; ?>"><?php echo $rowBuku['judul']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategoriID">Kategori:</label>
                        <select class="form-control" id="kategoriID" name="kategoriID" required>
                            <?php while ($rowKategori = mysqli_fetch_assoc($resultKategori)) : ?>
                            <option value="<?php echo $rowKategori['kategoriID']; ?>">
                                <?php echo $rowKategori['namaKategori']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Tambah Relasi</button>
                </form>
            </div>
        </section>
    </div>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php mysqli_close($koneksi); ?>