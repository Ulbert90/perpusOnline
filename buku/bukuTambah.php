<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../src/js/script.js"></script>
    <link rel="stylesheet" href="../admin/dasboard.css">
</head>

<body>

    <?php
    include_once '../modal/sidebarBuku.php'
        ?>
    <div class="content">
        <!-- main konten-->
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="bukuTambah_act.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                            <input type="date" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="coverBuku" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="coverBuku" name="coverBuku"
                                onchange="previewImage(this)">
                            <img id="preview" src="#" alt="Preview"
                                style="max-width: 100%; max-height: 200px; margin-top: 10px; display: none;">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Input</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

</html>