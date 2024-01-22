<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="sidebar">
        <a href="../dasboard.php"><i class="fas fa-bars"></i> Dasboard </a>
        <a href="user.php"><i class="fas fa-user-tie"></i> User Aplikasi</a>
        <a href="../../buku/data_buku.php"><i class="fas fa-book"></i> Data Buku</a>
        <a href="../../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
    <?php
    include_once '../../config.php';
        ?>

    <div id="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><i class="fas fa-home"></i> Home</li>
                <li class="breadcrumb-item" aria-current="page">Data Buku</li>
                <li class="breadcrumb-item"><a href="tambahAdmin.php">Tambah Admin</a></li>
            </ol>
        </nav>
        <!-- Main Content Section -->
        <div class="container">
            <table class="table table-striped-columns border border-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Role</th>
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
                        <td colspan="7">I am wanna have a relationship too 😓...</td>
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
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>


    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous">
    </script>

    <!--CDN-->
</body>

</html>
<style>
body {
    font-family: "Arial", sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

#sidebar {
    position: fixed;
    height: 100%;
    width: 250px;
    background: #202020;
    padding-top: 20px;
}

#sidebar a {
    padding: 15px 20px;
    font-size: 18px;
    color: #ffffff;
    text-decoration: none;
    display: block;
    transition: all 0.3s;
}

#sidebar a:hover {
    background-color: #00bd16;
}

#content {
    margin-left: 250px;
    padding: 30px;
}
</style>