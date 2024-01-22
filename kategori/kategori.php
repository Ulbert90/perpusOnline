<?php
include_once '../config.php';

// Inner join query
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
    <title>Kategori </title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<style>
.fixed-top {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

/* Add this style to push content down to avoid overlapping with fixed navbar and sidebar */
</style>

<body>
    <?php include_once '../navigation/sidebar.php'; ?>

    <div id="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                <li class="breadcrumb-item"><a href="kategoriGenre.php">Tambah kategori</a></li>
                <li class="breadcrumb-item"><a href="kategoriTambah.php">Tambah relasi</a></li>
            </ol>
        </nav>
        <div class="container">
            <table class="table table-striped-columns border border-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" width="10%">Cover Buku</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if ($result) {
                        $no = 1;
                        while ($d = mysqli_fetch_assoc($result)) {
                            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['judul']; ?></td>
                        <td><?php echo $d['penulis']; ?></td>
                        <td><?php echo $d['penerbit']; ?></td>
                        <td><?php echo $d['namaKategori']; ?></td>
                        <td>
                            <img src="../img/<?php echo $d['coverBuku']; ?>"
                                style="width:100px; height:100px; border: solid #000;">
                        </td>
                        <td>
                            <button class="btn btn-danger">
                                <a href='kategoriHapus.php?kategoriBukuID=<?php echo $d['kategoriBukuID']; ?>'><i
                                        class="fas fa-trash-can text-white"></i></a>
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        // Handle query error
                        echo "<tr><td colspan='7'>i am wanna have a relationship too...</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php mysqli_close($koneksi); ?>