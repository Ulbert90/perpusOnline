<?php
$server = "localhost";
$username = "root";
$password = "root";
$db = "APD";

$koneksi = mysqli_connect($server, $username, $password, $db);
if(!$koneksi){
    die ("DIE " . mysqli_connect_errno());
}
?>