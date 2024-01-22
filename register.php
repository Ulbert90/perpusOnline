<?php
session_start();
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $NL = mysqli_real_escape_string($koneksi, $_POST["namaLengkap"]);
    $alamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);

    // Hash the password using MD5 (not recommended for real-world scenarios)
    $hashedPassword = md5($password);

    // Check if the username already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (!$checkResult) {
        die("Error: " . mysqli_error($koneksi));
    }

    $existingUser = mysqli_num_rows($checkResult);

    if ($existingUser > 0) {
        echo "<script>Username sudah ada</script>";
        exit();
    }

    // Set the default role to "peminjam"
    $role = "peminjam";

    // Insert the new user into the database with the specified role
    $insertQuery = "INSERT INTO users (username, password, email, namaLengkap, alamat, role) VALUES ('$username', '$hashedPassword', '$email', '$NL', '$alamat', '$role')";
    $insertResult = mysqli_query($koneksi, $insertQuery);

    if (!$insertResult) {
        die("Error: " . mysqli_error($koneksi));
    }

    header("location: index.php");
    echo "<script>DB Berhasil ditambhakan</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register perpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
body {
    background-image: url('https://img.freepik.com/free-photo/grunge-paint-background_1409-1337.jpg?w=900&t=st=1705821551~exp=1705822151~hmac=6cc7c39cbf241a3fc3bd2d2f8bd7d679db810c24965feb601d28f199c8bec9a8');
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
</style>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Form Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="alamat" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                            </div>
                            <p class="mt-3">SUdah Punya Akun?<a href="index.php"> Ayo Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>