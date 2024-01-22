<?php
    include_once '../navigation/sidebar.php';
    include_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

    <div id="content">
        <!-- Main Content Section -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><i class="fas fa-home"></i> Home</li>
                <li class="breadcrumb-item" aria-current="page">Data Buku</li>
                <li class="breadcrumb-item"><a href="bukuTambah.php">Tambah Data Buku</a></li>
            </ol>
        </nav>

        <div class="container">
            <table class="table table-bordered border border-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col" width="10%">Cover Buku</th>
                        <th scope="col" width="18%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $queryKategori = mysqli_query($koneksi, "SELECT * FROM buku");
                        $jumlahKategori = mysqli_num_rows($queryKategori);

                        if ($jumlahKategori == 0) {
                        ?>
                    <tr>
                        <td colspan="7">i am wanna have a relationship too😓...</td>
                    </tr>
                    <?php
                        } else {
                            while ($d = mysqli_fetch_assoc($queryKategori)) {
                        ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['judul']; ?></td>
                        <td><?php echo $d['penulis']; ?></td>
                        <td><?php echo $d['penerbit']; ?></td>
                        <td><?php echo $d['tahunTerbit']; ?></td>
                        <td>
                            <img src="../img/<?php echo $d['coverBuku']; ?>"
                                style="width:100px;height:100px; border: solid #000;">
                        </td>
                        <td>
                            <a href="bukuEdit.php?bukuID=<?php echo $d['bukuID']; ?>"
                                class="btn btn-warning text-white">
                                <i class="fas fa-pen-to-square"></i> Edit
                            </a>
                            <a class="btn btn-danger" href='bukuHapus.php?bukuID=<?php echo $d['bukuID']; ?>'> <i
                                    class="fas fa-trash-can"></i> Delete</a>

                        </td>
                    </tr>
                    <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>