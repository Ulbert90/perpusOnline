<?php

include_once '../../config.php';

function tambahUlasan($userID, $bukuID, $ulasan, $rating) {
    global $conn;

    $sql = "INSERT INTO ulasanBuku (userID, bukuID, ulasan, rating) VALUES ('$userID', '$bukuID', '$ulasan', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Ulasan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>