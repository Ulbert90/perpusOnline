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
    <?php
    require_once '../navigation/navbar.php';
    ?>

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
        $count = 0; // Inisialisasi variabel hitungan
        if ($result) {
            while ($d = mysqli_fetch_assoc($result)) {
                if ($count % 4 == 0) {
                    // Buka div row setiap kali mencapai 4 perulangan
                    echo '</div><div class="row mt-4">';
                }
        ?>
            <div class="col-md-3">
                <div class="card border-dark fs-5 mb-3" style="max-width: 18rem;">
                    <img src="../img/<?php echo $d['coverBuku']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $d['judul']?></h5>
                        <p class="card-text border-bottom"><?php echo $d['penulis']?></p>
                        <h4 class="card-text border-bottom">Ulasan</h4>
                        <div class="col d-flex justify-content-between">
                            <p class="card-text"><?php echo $d['penerbit']?></p>
                            <p class="card-text"><?php echo $d['tahunTerbit']?></p>
                        </div>
                        <div class="col d-flex">
                            <a href="#" class="btn btn-primary"><i class="fas fa-book"></i></a>
                            <a href="#" class="btn btn-success"><i class="fas fa-plus"></i>add</a>
                            <div class="col d-flex justify-content-end">
                                <a type="button" class="btn btn-warning text-white"><i class="fas fa-star"></i>
                                    Rating</a>
                            </div>
                        </div>


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
    <script>
    $(document).ready(function() {
        // Muat koleksi buku saat halaman dimuat
        loadBookCollection();

        // Fungsi untuk memuat koleksi buku menggunakan AJAX
        function loadBookCollection() {
            $.ajax({
                url: 'load_books.php',
                type: 'GET',
                success: function(response) {
                    $('#bookContainer').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Tangani klik tombol "Add" menggunakan event delegation karena tombol ini
        // dimuat secara dinamis melalui AJAX
        $('#bookContainer').on('click', '.btn-add', function() {
            var bukuID = $(this).data('bukuid');

            $.ajax({
                url: 'tambah_ke_koleksi.php',
                type: 'POST',
                data: {
                    bukuID: bukuID
                },
                success: function(response) {
                    alert(response);
                    // Muat ulang koleksi buku setelah menambahkan ke koleksi
                    loadBookCollection();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>