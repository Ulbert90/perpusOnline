<?php
$host = "localhost";
$username = "root";
$password = "root";
$database = "APD";

try {
    $mysqli = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
 // Adjust the path based on your file structure
session_start();

if (!isset($_SESSION['userID'])) {
    echo "Session userID not set.";
    exit;
}

if (!isset($_GET['koleksiID']) || empty($_GET['koleksiID'])) {
    echo "Invalid koleksiID.";
    exit;
}

$koleksiID = $_GET['koleksiID'];
$userID = $_SESSION['userID'];

// Check if the book belongs to the logged-in user
$checkOwnershipQuery = "SELECT * FROM koleksiPribadi WHERE koleksiID = ? AND userID = ?";
$checkOwnershipStmt = $mysqli->prepare($checkOwnershipQuery);

if ($checkOwnershipStmt) {
    $checkOwnershipStmt->bind_param("ii", $koleksiID, $userID);
    $checkOwnershipStmt->execute();
    $checkOwnershipStmt->store_result();

    if ($checkOwnershipStmt->num_rows <= 0) {
        echo "You do not have permission to delete this book.";
        exit;
    }

    $checkOwnershipStmt->close();
} else {
    echo "Error preparing statement: " . $mysqli->error;
    exit;
}

// Delete book from koleksiPribadi
$deleteQuery = "DELETE FROM koleksiPribadi WHERE koleksiID = ?";
$deleteStmt = $mysqli->prepare($deleteQuery);

if ($deleteStmt) {
    $deleteStmt->bind_param("i", $koleksiID);

    if ($deleteStmt->execute()) {
        echo "Book deleted successfully!";
    } else {
        echo "Error deleting book: " . $deleteStmt->error;
    }

    $deleteStmt->close();
} else {
    echo "Error preparing statement: " . $mysqli->error;
}

$mysqli->close();
?>