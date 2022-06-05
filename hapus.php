<?php

require "functions.php";
$id = $_GET["id"];
if ( hapus($id) > 0) {
    echo "
            <script>
            alert('tujuan keuangan berhasil dihapus!');
            document.location.href = 'profil.php' ;
            </script>
            ";
} else {
    echo "
            <script>
            alert('tujuan keuangan gagal dihapus!');
            document.location.href = 'profil.php' ;
            </script>
            ";
}
?>