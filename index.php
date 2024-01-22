<?php
session_start();
include_once "config.php";

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
            header("location: peminjam/index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Login Page</title>
    <style>
    body {
        background-image: url('https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?w=996&t=st=1705748883~exp=1705749483~hmac=6cd79cc787cc69c8e099876aa976d75d18add4e21f35109276961b2b12c5352c');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 25rem;
    }

    .card-img-top {
        height: 10rem;
        width: 10rem;
        /* Center the image horizontally */
        margin: 0 auto;
        display: block;
    }
    </style>
</head>

<body>
    <section>
        <div class="card">
            <img src="img/arc.png" class="card-img-top mt-4" alt="User Image">
            <div class="card-body">
                <h5 class="card-title text-center mt-3">Login Perpus</h5>
                <hr>

                <!-- Login Form -->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" type="submit">Login</button>
                    </div>
                    <p class="mt-2">Belum Punya Akun?<a href="register.php"> Register</p>
                </form>

            </div>
        </div>
    </section>
</body>

</html>