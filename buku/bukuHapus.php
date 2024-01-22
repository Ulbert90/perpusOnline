<?php
include '../config.php';

// Check if the 'bukuID' key exists in the $_GET array
if(isset($_GET["bukuID"])) {
    $id = $_GET["bukuID"];

    // jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM buku WHERE bukuID='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    // periksa query, apakah ada kesalahan
    if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    } else {
        // Handle success case, if needed
        header("location: data_buku.php");
    }
} else {
    // Handle the case where 'bukuID' key is not set
    echo "Parameter 'bukuID' is missing.";
}
?>