<?php
session_start();
include_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    // Hash the password using MD5 (not recommended for real-world scenarios)
    $hashedPassword = md5($password);

    // Check if the username and password match a user in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error: " . mysqli_error($koneksi));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Store user information in the session
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect to the home page or a dashboard based on the user's role
        if ($user['role'] == 'admin') {
            header("location: admin/dasboard.php");
        } elseif ($user['role'] == 'petugas') {
            header("location: admin/dasboard.php");
        } elseif ($user['role'] == 'peminjam') {
            header("location: public/peminjam.php");
        } else {
            // Handle unknown roles or redirect to a default page
            header("location: index.php");
        }

        exit();
    } else {
        echo "<script>alert('Username atau password salah.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Perpus</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
    body {
        background-image: url(https://img.freepik.com/free-photo/abundant-collection-antique-books-wooden-shelves-generated-by-ai_188544-29660.jpg?t=st=1704766725~exp=1704770325~hmac=6fcf12e1d633e4afc8f715ed28df2aadf03596ae92911ffcddca3ac6ac399a37&w=996);
        background-size: cover;
        background-position: center;
        margin: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <!-- Assuming you have an enum definition for UserRole -->
                            <div class="text-center mx-auto">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                                <a href="register.php" class="btn btn-success btn-lg">Daftar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Use a relative path for bootstrap.min.js -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>