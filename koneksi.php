<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "APD";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("FAILED: " . mysqli_connect_error());

}
?>