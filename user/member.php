<?php
include_once '../koneksi.php';
include_once '../modal/sidebar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member | Perpus</title>
    <link rel="stylesheet" href="../admin/dasboard.css">
</head>

<body>

    <nav>
        <ul class="navbar-left">
        </ul>
        <div class="navbar-center">
        </div>
        <div class="navbar-rihgt">
            <div class="navbar-container p-3 ml-5 ">
                <a href="dasboard.php">
                    <img src="../img/arc.png" class="" width="35" height="60">
                </a>
                <h4 class="text-white">Dasboard Admin</h4>
            </div>
        </div>
    </nav>

    <div class="content">
        <!-- Main Content Section -->
        <section id="datas">
            <a href="../admin/adminTambah.php">
                <i class="fas fa-plus mt-3"></i> Tambah Admin/Petugas Baru</a>
            <div class="container mt-5">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" width="1%">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Role</th>
                            <th scope="col" width="10%">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $no = 1;
                $queryKategori = mysqli_query($koneksi, "SELECT * FROM users");
                $jumlahKategori = mysqli_num_rows($queryKategori);

                if ($jumlahKategori == 0) {
                ?>
                        <tr>
                            <td colspan="7">Minimal Login</td>
                        </tr>
                        <?php
                } else {
                    while ($d = mysqli_fetch_assoc($queryKategori)) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['namaLengkap']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td><?php echo $d['role']; ?></td>
                            <td class="">
                                <a class="btn btn-warning text-white"
                                    href="memberEdit.php?id=<?php echo $d['userID']; ?>"><i
                                        class="fas fa-pencil"></i></a>
                                <a class="btn btn-danger" href="memberHapus.php?id=<?php echo $d['userID']; ?>"><i
                                        class="fas fa-trash-can"></i></a>
                            </td>

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


    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-lY7G4dzc01LY6QanF1YU6nA9fdGFLf6EAgFjjBqYbhaStT/GvjqeN6lZaHAR+iS" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!--CDN-->
</body>

</html>