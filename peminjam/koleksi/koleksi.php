<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
require_once '../../navigation/navbar.php';
require_once '../../config.php';

// Establish database connection
$host = "localhost";
$username = "root";
$password = "root";
$database = "APD";

$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT koleksiPribadi.koleksiID, users.userName, buku.judul
    FROM koleksiPribadi
    INNER JOIN users ON koleksiPribadi.userID = users.userID
    INNER JOIN buku ON koleksiPribadi.bukuID = buku.bukuID";

// Execute the query
$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = $result->fetch_assoc()) {
        echo "Koleksi ID: " . $row['koleksiID'] . " - User Name: " . $row['userName'] . " - Judul Buku: " . $row['judul'] . "<br>";
    }

    // Free the result set
    $result->free();
} else {
    // Display an error message if the query fails
    echo "Error: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();


    require_once '../../navigation/footer.php';
    ?>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>