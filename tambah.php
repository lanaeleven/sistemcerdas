 <?php
    require "functions.php";
    if (isset($_POST["submit"])) {
        if (tambah($_POST) > 0) {
            echo "
            <script>
            alert('tujuan keuangan berhasil ditambahkan!');
            document.location.href = 'profil.php' ;
            </script>
            ";
        } else {
            echo "
            <script>
            alert('tujuan keuangan gagal ditambahkan!');
            document.location.href = 'profil.php' ;
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tujuan Keuangan</title>
</head>
<body>
    <h1>Tambah Tujuan Keuangan</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_tujuan">Nama Tujuan Keuangan:</label>
                <input type="text" name="nama_tujuan" id="nama_tujuan" required>
            </li>
            <li>
                <label for="waktu_tujuan">Kapan Tujuan Keuangan akan dipakai:</label>
                <input type="date" name="waktu_tujuan" id="waktu_tujuan" required>
            </li>
            <li>
                <label for="periode_beli_emas">Berapa bulan sekali Anda akan membeli emas?:</label>
                <input type="text" name="periode_beli_emas" id="periode_beli_emas" required>
            </li>
            <li>
                <label for="jumlah_emas_sekarang">Berapa emas yang sudah Anda miliki sekarang:</label>
                <input type="text" name="jumlah_emas_sekarang" id="jumlah_emas_sekarang" required> gram
            </li>
            <li>
                <label for="jumlah_emas_tujuan">jumlah_emas_tujuan:</label>
                <input type="text" name="jumlah_emas_tujuan" id="jumlah_emas_tujuan" required> gram
            </li>
            <li>
                <button type="submit" name="submit">Tambah Tujuan Keuangan</button>
            </li>
        </ul>
    </form>
</body>
</html>