<?php
$conn = mysqli_connect("localhost", "root", "", "investasi_emas");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

        $nama_tujuan = htmlspecialchars($data["nama_tujuan"]);
        $waktu_tujuan = $data["waktu_tujuan"];
        $periode_beli_emas = htmlspecialchars($data["periode_beli_emas"]);
        $jumlah_emas_sekarang = htmlspecialchars($data["jumlah_emas_sekarang"]);
        $jumlah_emas_tujuan = htmlspecialchars($data["jumlah_emas_tujuan"]);

        $query = "INSERT INTO tujuan_keuangan
                    VALUES(
                        '', '1', '$nama_tujuan', '$waktu_tujuan', '$periode_beli_emas', '$jumlah_emas_sekarang',  '$jumlah_emas_tujuan'
                    )
                    ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tujuan_keuangan WHERE id_tujuan_keuangan = $id");
    return mysqli_affected_rows($conn);
}

function getSisaBulan($waktu_tujuan, $periode, $emas_yg_msh_kurang) {
    $tanggal_sekarang = date_create(date("Y-m-d"));
            $tanggal_tujuan = date_create($waktu_tujuan);
            $selisih_tanggal = date_diff($tanggal_sekarang, $tanggal_tujuan);
            $sisa_bulan = ((int)$selisih_tanggal->format("%y")*12) + (int)$selisih_tanggal->format("%m");
            $frekuensi = $emas_yg_msh_kurang / ($sisa_bulan / $periode);
            return $frekuensi;
}

function ubah($data) {
    global $conn;
    $id = $data["id_tujuan_keuangan"];
    $nama_tujuan = htmlspecialchars($data["nama_tujuan"]);
    $waktu_tujuan = $data["waktu_tujuan"];
    $periode_beli_emas = htmlspecialchars($data["periode_beli_emas"]);
    $jumlah_emas_sekarang = htmlspecialchars($data["jumlah_emas_sekarang"]);
    $jumlah_emas_tujuan = htmlspecialchars($data["jumlah_emas_tujuan"]);
    $query = "UPDATE tujuan_keuangan SET
                nama_tujuan = '$nama_tujuan', waktu_tujuan = '$waktu_tujuan', periode_beli_emas = '$periode_beli_emas', jumlah_emas_sekarang = '$jumlah_emas_sekarang', jumlah_emas_tujuan = '$jumlah_emas_tujuan'
                WHERE id_tujuan_keuangan = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function daftar($data) {
    global $conn;

    $nama = $data["nama"];
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $email_sama = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($email_sama)) {
        echo "
            <script>
            alert('Email sudah pernah dipakai');
            </script>
            ";
            return false;
    }

    if ($password !== $password2) {
        echo "
            <script>
            alert('Konfirmasi password tidak sesuai');
            </script>
            ";
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

// function cari($keyword) {
//     global $conn;
//     $query = "SELECT * FROM mahasiswa WHERE 
//     nama LIKE '%$keyword%' OR
//     nrp LIKE '%$keyword%' OR
//     jurusan LIKE '%$keyword%'
//     ";
//     return query($query);
// }

?>