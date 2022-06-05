<?php
require 'functions.php';
$tujuan_keuangan = query("SELECT * FROM tujuan_keuangan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
</head>
<body>
    <h1>Tujuan Keuangan</h1>
    <a href="tambah.php">Tambah tujuan keuangan</a>
    <br><br>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama Tujuan</th>
            <th>Waktu kapan pemakaian uang</th>
            <th>Jumlah emas sekarang</th>
            <th>Jumlah emas yang harus ada</th>
            <th>Saran frekuensi beli emas</th>
        </tr>
        <?php
        $nomor = 1;
        foreach($tujuan_keuangan as $tk):
            $frekuensi = getSisaBulan($tk["waktu_tujuan"], $tk["periode_beli_emas"], $tk["jumlah_emas_tujuan"] - $tk["jumlah_emas_sekarang"]);
        ?>
        <tr>
            <td><?=$nomor?></td>
            <td>
                <a href="ubah.php?id=<?= $tk['id_tujuan_keuangan'] ?>">ubah</a> |
                <a href="hapus.php?id=<?= $tk['id_tujuan_keuangan'] ?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
            <td><?=$tk["nama_tujuan"];?></td>
            <td><?=$tk["waktu_tujuan"];?></td>
            <td><?=$tk["jumlah_emas_sekarang"];?> gram</td>
            <td><?=$tk["jumlah_emas_tujuan"];?> gram</td>
            <td>Anda harus membeli emas sebanyak <?=$frekuensi;?> gram setiap <?=$tk["periode_beli_emas"];?> bulan sekali</td>
        </tr>

        <?php
        $nomor++;
        endforeach;
        ?>
    </table>
</body>
</html>