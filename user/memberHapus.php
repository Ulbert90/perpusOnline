<?php
include_once '../koneksi.php';

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $deleteQuery = "DELETE FROM users WHERE userID='$id'";
    $deleteResult = mysqli_query($koneksi, $deleteQuery);

    if (!$deleteResult) {
        die("Error: " . mysqli_error($koneksi));
    }

    // Redirect back to the member.php page
    header("location: member.php");
    exit();
} else {
    echo "Error: User ID not provided.";
}
?>