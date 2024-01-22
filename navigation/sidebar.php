<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/css/sidebar.css" />
    <!-- Bootstrap CSS link -->
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="sidebar">
        <a href="../admin/dasboard.php"><i class="fas fa-bars"></i> Dasboard </a>
        <a href="../admin/adminFitur/user.php"><i class="fas fa-user-tie"></i> User Aplikasi</a>
        <a href="../buku/data_buku.php"><i class="fas fa-book"></i> Data Buku</a>
        <a href="../kategori/kategori.php"><i class="fas fa-hashtag "></i> Kategori Buku</a>
        <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</body>

</html>
<style>
body {
    font-family: "Arial", sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

#sidebar {
    position: fixed;
    height: 100%;
    width: 250px;
    background: #202020;
    padding-top: 20px;
}

#sidebar a {
    padding: 15px 20px;
    font-size: 18px;
    color: #ffffff;
    text-decoration: none;
    display: block;
    transition: all 0.3s;
}

#sidebar a:hover {
    background-color: #00bd16;
}

#content {
    margin-left: 250px;
    padding: 30px;
}
</style>