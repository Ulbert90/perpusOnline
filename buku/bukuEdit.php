<?php
// Include your database connection file
include('../config.php');
include('../navigation/sidebar.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $bukuID = $_POST['bukuID'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];
    // Note: In a real application, you should validate and sanitize user input.

    // Update the book details in the database
    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunTerbit=$tahunTerbit WHERE bukuID=$bukuID";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Book details updated successfully.";
        header("location: data_buku.php");
    } else {
        echo "Error updating book details: " . mysqli_error($koneksi);
    }
}

// Retrieve book details based on bukuID
$bukuID = $_GET['bukuID']; // Assuming you pass bukuID as a parameter in the URL
$query = "SELECT * FROM buku WHERE bukuID = $bukuID";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Details</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div id="content">
        <h1 class="text-center fs-5">Tambah Data Buku</h1>
        <hr class="mt-2">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="bukuEdit.php">
                        <input type="hidden" name="bukuID" value="<?php echo $row['bukuID']; ?>">

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <input type="text" name="judul" value="<?php echo $row['judul']; ?>" class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label">penulis:</label>
                            <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit:</label>
                            <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tahunTerbit" class="form-label">Tahun Terbit:</label>
                            <input type="text" name="tahunTerbit" value="<?php echo $row['tahunTerbit']; ?>"
                                class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="data_buku.php" class="btn btn-success">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>