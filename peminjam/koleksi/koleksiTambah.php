<?php
include_once '../../config.php';
session_start(); // Start the session

if (!isset($_SESSION['userID'])) {
    echo "Session userID not set.";
    exit;
}

// Check if $mysqli is set and not null
if (!isset($mysqli) || $mysqli === null) {
    echo "Database connection not established.";
    exit;
}

// Fetch available books using INNER JOIN
$booksQuery = "SELECT buku.bukuID, buku.judul FROM buku
               INNER JOIN koleksiPribadi ON buku.bukuID = koleksiPribadi.bukuID
               WHERE koleksiPribadi.userID = " . $_SESSION['userID'];

$booksResult = $mysqli->query($booksQuery);

if (!$booksResult) {
    echo "Error fetching books: " . $mysqli->error;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Add to Collection</h2>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="selectedBook" class="form-label">Select a Book</label>
                        <select class="form-select" id="selectedBook" name="selectedBook" required>
                            <?php while ($book = $booksResult->fetch_assoc()) : ?>
                            <option value="<?php echo isset($book['bukuID']) ? $book['bukuID'] : ''; ?>">
                                <?php echo isset($book['judul']) ? $book['judul'] : 'Unknown Title'; ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Collection</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../../navigation/footer.php'; ?>
</body>

</html>