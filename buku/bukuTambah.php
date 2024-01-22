<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | perpus</title>
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

    <?php
    include_once '../navigation/sidebar.php'
        ?>
    <div id="content">
        <!-- main konten-->
        <h1 class="text-center fs-5">Tambah Data Buku</h1>
        <hr class="mt-2">
        <div class="container mt-5">
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
                            <input type="number" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder=""
                                min="1000" max="9999">
                        </div>
                        <div class="mb-3">
                            <label for="coverBuku" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="coverBuku" name="coverBuku"
                                onchange="previewImage(this)">
                            <img id="preview" src="#" alt="Preview"
                                style="max-width: 100%; max-height: 100px; margin-top: 10px; display: none; border: solid #000;">
                        </div>
                        <button type="submit" class="btn btn-outline-success">Input</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <body>
        <script src="../assets/js/bootstrap.min.js">
        </script>
    </body>

</html>