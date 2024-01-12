<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dasboard.css">
</head>

<body>

    <nav>
        <ul class="navbar-left">
        </ul>
        <div class="navbar-center">
        </div>
        <div class="navbar-rihgt">
            <div class="navbar-container p-3 ml-5 ">
                <a href="dasboard.php">
                    <img src="../img/arc.png" class="" width="35" height="60">
                </a>
                <h4 class="text-white">Dasboard Admin</h4>
            </div>
        </div>
    </nav>


    <?php
    include_once '../modal/sidebar.php'
        ?>

    <div class="content">
        <div class="alert alert-primary fs-1">Dasboard Admin</div>
        <p>This is the main content area. You can add your content here.</p>
    </div>


    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-lY7G4dzc01LY6QanF1YU6nA9fdGFLf6EAgFjjBqYbhaStT/GvjqeN6lZaHAR+iS" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!--CDN-->
</body>

</html>