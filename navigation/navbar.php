<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Menambahkan event listener untuk merespons perubahan nilai pada input pencarian
    document.getElementById('searchInput').addEventListener('input', function() {
        // Ambil nilai input pencarian
        var searchTerm = this.value.trim().toLowerCase();

        // Lakukan sesuatu dengan nilai pencarian, misalnya filter daftar buku
        // ...

        // Contoh: Tampilkan nilai pencarian di console
        console.log(searchTerm);
    });
    </script>
</body>

</html>