<?php
$servername = "localhost";
$database = "perpusDigital";
$username = "root";
$password = "root";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {

    die("FAILED: " . mysqli_connect_error());

}
?>