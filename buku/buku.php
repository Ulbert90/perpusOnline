<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="dasboard.css">
</head>
<style>
.content {
    margin-left: 250px;
    padding: 16px;
}
</style>

<body>

    <?php
        include_once '../modal/sidebarBuku.php'
        ?>
    <div class="content">
        <!-- main konten -->
        <div class="card">
            <div class="card-body">
                Dasboard admin perpus digital Palapa.
            </div>
        </div>

        <div class="container">

            <div class="row mt-4">
                <!-- First Content Block -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-success">
                            <h5 class="card-title fs-2"><i class="fa-solid fa-book"></i> Peminjam</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                posuere
                                erat a ante.</p>
                        </div>
                    </div>
                </div>

                <!-- Second Content Block -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-primary">
                            <h5 class="card-title fs-2"><i class="fa-solid fa-bookmark"></i> Pengembalian</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                posuere
                                erat a ante.</p>
                        </div>
                    </div>
                </div>
            </div>





            <!-- LAINNYA -->
            <div class="container mt-4 ml-2 ">
                <a href="callCenter.png">
                    <img src="https://cdn-icons-png.flaticon.com/512/6524/6524078.png?ga=GA1.1.393769290.1705001187&"
                        class="border border-success rounded-circle shadow" width="50" height="50" alt="callcenter">
                    <span> Call Center</span>
                </a>
            </div>
        </div>

    </div>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

</html>