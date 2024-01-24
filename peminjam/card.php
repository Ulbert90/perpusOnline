<?php
$server = "localhost";
$username = "root";
$password = "root";
$db = "APD";

$koneksi = mysqli_connect($server, $username, $password, $db);
if (!$koneksi) {
    die("DIE " . mysqli_connect_errno());
}

$sql = "SELECT b.*, kb.namaKategori, kbr.kategoriBukuID
FROM buku b
INNER JOIN kategoriBuku_relasi kbr ON b.bukuID = kbr.bukuID
INNER JOIN kategoriBuku kb ON kbr.kategoriID = kb.kategoriID";

$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
</head>

<body style="height: 1000vh;">

    <!-- Navbar -->


    <!-- Mengimpor file script.js -->
    <!-- Card -->


    <!-- Footer -->


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>