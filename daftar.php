<?php
    require "functions.php";
    if (isset($_POST["submit"])) {
        if (daftar($_POST) > 0) {
            echo "
            <script>
            alert('Berhasil daftar');
            </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar User</title>
</head>
<body>
    <h1>Daftar Akun User</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi password:</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="submit">Daftar</button>
            </li>
        </ul>
    </form>
</body>
</html>