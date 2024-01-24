<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Establish database connection
$host = "localhost";
$username = "root";
$password = "root";
$database = "APD";

try {
    $mysqli = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Query untuk INNER JOIN koleksiPribadi, users, dan buku
$query = "SELECT koleksiPribadi.koleksiID, users.userName, buku.judul, buku.penulis, buku.penerbit, buku.tahunTerbit,
 buku.coverBuku
FROM koleksiPribadi
INNER JOIN users ON koleksiPribadi.userID = users.userID
INNER JOIN buku ON koleksiPribadi.bukuID = buku.bukuID";

try {
    $result = $mysqli->query($query);

    if (!$result) {
        throw new Exception("Query execution failed: " . $mysqli->error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
</head>

<body style="height: 1000vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Buku
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../index.php">Kategori Buku</a></li>
                            <li><a class="dropdown-item" href="koleksi.php">Koleksimu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Setting
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Pimjam</a></li>
                            <li><a class="dropdown-item" href="#">profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="navbar-brand mx-auto text-center fs-2 fw-bold" href="/APD/peminjam/index.php">SMK PALAPA
                    SEMARANG</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" id="searchInput" placeholder="Cari buku..."
                        aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h5>Koleksi Bukumu</h5>
            </div>
        </div>
        <div class="row mt-4">
            <?php
            $count = 0; // Initialize the count variable
            if ($result->num_rows > 0) {
                while ($d = $result->fetch_assoc()) {
                    if ($count % 4 == 0) {
                        // Close the previous row and start a new row after every 4 iterations
                        echo '</div><div class="row mt-4">';
                    }
                    ?>
            <div class="col-md-3">
                <div class="card border-dark fs-5 mb-3" style="max-width: 18rem;">
                    <img src="../img/<?php echo $d['coverBuku'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo (strlen($d['judul']) > 18) ? substr($d['judul'], 0, 18) . '...' : $d['judul']; ?>
                        </h5>
                        <p class="card-text border-bottom"><?php echo $d['penulis'] ?></p>
                        <div class="col d-flex justify-content-between">
                            <p class="card-text"><?php echo $d['penerbit'] ?></p>
                            <p class="card-text"><?php echo $d['tahunTerbit'] ?></p>
                        </div>
                        <div class="col d-flex">
                            <a href="#" class="btn btn-primary"><i class="fas fa-book"></i></a>
                            <a href="koleksi/koleksi.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                            <a href="koleksiHapus.php?koleksiID=<?php echo $d['koleksiID']; ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                            <div class="col d-flex justify-content-end">
                                <a href="like.php" class="btn border text-danger"
                                    data-bukuid="<?php echo $d['koleksiID']; ?>"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <a href="ulasan/ulasan.php" class="btn fw-bold border-top">Beri Ulasan</a>
                    </div>
                </div>
            </div>
            <?php
                    $count++;
                }
            } else {
                echo '<p>No records found</p>';
            }
            ?>
        </div>
    </div>
    <?php
    include_once '../../navigation/footer.php';
    ?>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>