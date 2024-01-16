<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/dasboard.css">
    <style>
    .content {
        margin-left: 250px;
        padding: 16px;
        background-image: url(https://img.freepik.com/free-vector/green-curve-abstract-background_53876-99569.jpg?w=740&t=st=1705073597~exp=1705074197~hmac=b70529ce9b64b9f711425a58464fd85360a444e3dd7c0f4e0290bdd244252d4d);
        background-size: cover;
        color: white;
        backdrop-filter: blur(8px);
        /* Set text color to white for better visibility */
    }

    .transparent {
        opacity: 0.8;
        /* Set the desired opacity value (0.0 to 1.0) */
    }

    .transparent a {
        text-decoration: none;
        color: inherit;
        /* Inherit the text color from the parent */
    }

    .transparent img {
        border: 2px solid #000;
        /* Set border color */
        border-radius: 50%;
        /* Make the image circular */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        /* Add a subtle shadow */
    }

    #clock {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 2rem;
        border: solid #000;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <?php
        include_once '../modal/sidebarBuku.php';
        include_once '../koneksi.php';
    ?>
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

    <div class="content">
        <!-- main content -->
        <div class="card">
            <div class="card-body">
                Dasboard admin perpus SMK PALAPA SEMARANG.
            </div>
        </div>

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-success border border-white rounded">
                            <a href="peminjam.php" class="card-link">
                                <h5 class="card-title fs-2 text-white"><i class="fa-solid fa-book"></i> Data Buku</h5>
                                <p class="card-text">Jumlah Total Buku yang dimiliki Perpus</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-primary border border-white rounded">
                            <a href="pengembalian.php" class="card-link">
                                <h5 class="card-title fs-2 text-white"><i class="fa-solid fa-bookmark"></i> Pengembalian
                                </h5>
                                <p class="card-text">Total Buku Yang Sudah di Kembalikan.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-warning border border-white rounded">
                            <a href="../user/member.php" class="card-link">
                                <h5 class="card-title fs-2 text-white"><i class="fa-solid fa-star"></i> Member Pass</h5>
                                <p class="card-text">Daftar Nama Member Pass .</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-danger border border-white rounded">
                            <a href="laporan.php" class="card-link">
                                <h5 class="card-title fs-2 text-white"><i class="fa-solid fa-file"></i> Report</h5>
                                <p class="card-text">Laporan Bulanan Peminjaman Buku.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Content -->
            <br>
            <hr class="mt-2">
            <footer class="p-3 m-3">
                <div class="card transparent mb-5">
                    <div class="row mt-3 p-5">
                        <div id="clock">
                            <script>
                            function updateClock() {
                                var now = new Date();
                                var hours = now.getHours();
                                var minutes = now.getMinutes();
                                var seconds = now.getSeconds();

                                // Format the time to have leading zeros
                                hours = hours < 10 ? "0" + hours : hours;
                                minutes = minutes < 10 ? "0" + minutes : minutes;
                                seconds = seconds < 10 ? "0" + seconds : seconds;

                                var timeString = hours + ":" + minutes + ":" + seconds;

                                // Update the clock element
                                document.getElementById("clock").innerHTML = timeString;
                            }

                            // Update the clock every second
                            setInterval(updateClock, 1000);

                            // Initial clock update
                            updateClock();
                            </script>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <a href="#">
                                <img src="https://cdn-icons-png.flaticon.com/512/3734/3734873.png?ga=GA1.1.522131655.1705073541&"
                                    width="50" height="50" alt="callcenter">
                                <span> Call Center</span>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="#">
                                <img src="https://cdn-icons-png.flaticon.com/512/2040/2040504.png?ga=GA1.1.522131655.1705073541&"
                                    width="50" height="50" alt="setings">
                                <span> Settings</span>
                            </a>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>