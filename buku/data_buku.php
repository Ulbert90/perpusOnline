<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/dasboard.css">
</head>

<body class="fixed" style=" 
        background-image: url(https://img.freepik.com/free-vector/set-torii-gates-water_52683-44986.jpg?w=740&t=st=1705077431~exp=1705078031~hmac=15b966f500d4ee2b2e1e040ed442af9a1e3851296883e7a5b785c3e4812f83a1);  background-size: cover;
        color: white;">
    <nav>
        <ul class=" navbar-left">
        </ul>
        <div class="navbar-center">
        </div>
        <div class="navbar-rihgt">
            <div class="navbar-container p-3 ml-5">
                <a href="dasboard.php">
                    <img src="../img/arc.png" class="" width="35" height="60">
                </a>
                <h4 class="text-white">Dasboard Admin</h4>
            </div>
        </div>
    </nav>

    <?php
    include_once '../modal/sidebarBuku.php';
    include_once '../koneksi.php';
    ?>

    <div class="content">
        <!-- Main Content Section -->
        <section id="datas">
            <div class="container mt-5">
                <table class="table table-striped-columns border border-dark">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Cover Buku</th>
                            <th scope="col">Opsi</th>
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
                                <a href="bukuEdit.php?id=<?php echo $d['bukuID']; ?>"
                                    class="btn btn-warning text-white">
                                    <i class="fas fa-pen-to-square"></i> Edit
                                </a>
                                <a href="bukuHapus.php?bukuID<?php echo $d['bukuID']; ?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
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