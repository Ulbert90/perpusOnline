<?php
require_once '../randomQuote.php';
require_once '../config.php';

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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
</head>

<body style="height: 1000vh;">

    <!-- Navbar -->
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
                            <li><a class="dropdown-item" href="#">Kategori Buku</a></li>
                            <li><a class="dropdown-item" href="koleksi/koleksi.php">Koleksimu</a></li>
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

    <!-- Mengimpor file script.js -->
    <div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-body">
                <p class="text-center fw-bold"><?php echo $randomQuote; ?></p>
            </div>
        </div>
    </div>
    <!-- Card -->

    <div class="container">
        <div class="row mt-4">
            <?php
            $count = 0; // Initialize the count variable
            if ($result) {
                while ($d = mysqli_fetch_assoc($result)) {
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
                        <p class="card-text border border-dark text-center"><?php echo $d['namaKategori'] ?></p>
                        <div class="col d-flex justify-content-between">
                            <p class="card-text"><?php echo $d['penerbit'] ?></p>
                            <p class="card-text"><?php echo $d['tahunTerbit'] ?></p>
                        </div>
                        <div class="col d-flex">
                            <a href="#" class="btn btn-primary"><i class="fas fa-book"></i></a>
                            <a href="koleksi/koleksiTambah.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                            <div class="col d-flex justify-content-end">
                                <a href="like.php" class="btn btn-danger text-white"
                                    data-bukuid="<?php echo $d['bukuID']; ?>"><i class="fas fa-heart"></i></a>
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
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once '../navigation/footer.php';
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>