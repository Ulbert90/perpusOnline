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
                        <form action="login_act.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <!-- Assuming you have an enum definition for UserRole -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="peminjam">Peminjam</option>
                                </select>
                            </div>
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