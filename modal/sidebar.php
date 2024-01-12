<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css" />
    <title>Simple Sidebar Example</title>
    <!-- Bootstrap CSS link -->
    <script src="https://kit.fontawesome.com/13c062a83b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div id="sidebar">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="dasboard.php"><i class="fas fa-user-tie"></i> Admin</a>
        <a href="data_buku.php"><i class="fas fa-computer"></i> Data Barang</a>
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</body>

</html>
<style>
    body {
        font-family: 'Arial', sans-serif;
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
        padding: 20px;
    }
</style>