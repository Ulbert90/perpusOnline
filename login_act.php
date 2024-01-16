<?php
session_start();
include_once "koneksi.php"; // Assuming this file contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
    $role = mysqli_real_escape_string($koneksi, $_POST["role"]); // Assuming a role field in the form

    // Hash the entered password securely (consider using password_hash() instead of md5)
    $hashedPassword = md5($password);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword' AND role='$role'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error: " . mysqli_error($koneksi));
    }

    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["status"] = "login";

        // Redirect based on user role
        switch ($role) {
            case 'admin':
                header("location: admin/dasboard.php");
                break;
            case 'petugas':
                header("location: petugas_dashboard.php");
                break;
            case 'peminjam':
                header("location: /public/peminjam.php");
                break;
            default:
                echo "Invalid user role";
                break;
        }
        exit();
    } else {
        header("location: login_form.php?pesan=GAGAL");
        exit();
    }
} else {
    header("location: login_form.php?pesan=GAGAL");
    exit();
}
?>