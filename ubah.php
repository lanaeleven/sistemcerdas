<?php
require "functions.php";
$id = $_GET["id"];
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Tujuan Keuangan berhasil diperbarui!');
        document.location.href = 'profil.php' ;
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Tujuan Keuangan gagal diperbarui!');
        document.location.href = 'profil.php' ;
        </script>
        ";
    }
}

$dataUbah = query("SELECT * FROM tujuan_keuangan WHERE id_tujuan_keuangan = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id_tujuan_keuangan" value = "<?= $dataUbah["id_tujuan_keuangan"] ?>">
        <ul>
        <li>
                <label for="nama_tujuan">Nama Tujuan Keuangan:</label>
                <input type="text" name="nama_tujuan" id="nama_tujuan" required value="<?= $dataUbah["nama_tujuan"] ?>">
            </li>
            <li>
                <label for="waktu_tujuan">Kapan Tujuan Keuangan akan dipakai:</label>
                <input type="date" name="waktu_tujuan" id="waktu_tujuan" required value="<?= $dataUbah["waktu_tujuan"] ?>">
            </li>
            <li>
                <label for="periode_beli_emas">Berapa bulan sekali Anda akan membeli emas?:</label>
                <input type="text" name="periode_beli_emas" id="periode_beli_emas" required value="<?= $dataUbah["periode_beli_emas"] ?>">
            </li>
            <li>
                <label for="jumlah_emas_sekarang">Berapa emas yang sudah Anda miliki sekarang:</label>
                <input type="text" name="jumlah_emas_sekarang" id="jumlah_emas_sekarang" required value="<?= $dataUbah["jumlah_emas_sekarang"] ?>"> gram
            </li>
            <li>
                <label for="jumlah_emas_tujuan">jumlah_emas_tujuan:</label>
                <input type="text" name="jumlah_emas_tujuan" id="jumlah_emas_tujuan" required value="<?= $dataUbah["jumlah_emas_tujuan"] ?>"> gram
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>