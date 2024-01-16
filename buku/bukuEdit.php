<?php
  // memanggil file koneksi.php untuk membuat koneksi
include_once '../koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['bukuID'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["bukuID"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM buku WHERE bukuID='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='data_buku.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='data_buku.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/dasboard.css">

</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Produk Buku</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <section class="base">
                <!-- menampung nilai id produk yang akan di edit -->
                <input name="id" value="<?php echo $data['bukuID']; ?>" hidden />

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" id="judul" name="judul" class="form-control"
                        value="<?php echo $data['judul']; ?>" autofocus required />
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="form-control"
                        value="<?php echo $data['penulis']; ?>" />
                </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" class="form-control" required
                        value="<?php echo $data['penerbit']; ?>" />
                </div>

                <div class="mb-3">
                    <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                    <input type="text" id="tahunTerbit" name="tahunTerbit" class="form-control" required
                        value="<?php echo $data['tahunTerbit']; ?>" />
                </div>

                <div class="mb-3">
                    <label for="gambar_produk" class="form-label">Cover Buku</label>
                    <img src="img/<?php echo $data['coverBuku']; ?>" style="width: 120px; margin-bottom: 5px;"
                        class="img-fluid rounded">
                    <input type="file" id="gambar_produk" name="gambar_produk" class="form-control" />
                    <small class="text-danger">Abaikan jika tidak merubah gambar produk</small>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </section>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>