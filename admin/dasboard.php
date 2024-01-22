<?php
include_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/css/sidebar.css">
    <style>

    </style>
    <title>Dasboard Admin</title>
</head>

<body>

    <?php
        require_once '../navigation/sidebar.php';
        ?>


    <!-- Content -->
    <main id="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="ms-auto fw-bold">Welcome Admin</h1>
        </div>
        <!-- Your main content goes here -->
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <p class="text-white fs-3 pull-right mb-3"><i class="fas fa-book"></i>
                                Koleksi Buku
                                <span>
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM buku");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <p class="text-white fs-3 pull-right mb-3"><i class="fas fa-user-tie"></i>
                                Pengguna
                                <span>
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM users");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>


    </main>
    </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>