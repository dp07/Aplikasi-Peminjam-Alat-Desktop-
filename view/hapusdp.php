<?php
require 'function.php';
session_start();

// tangkap id dari url
$id = $_GET['id'];
$kode_alat = $_GET['kode'];

// var_dump($_SESSION['status']);
// die();

// cek apakah data behasil dihapus
if (hapusDaftarPinjam($id, $kode_alat) > 0) {
    if ($_SESSION['status']) {

        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'daftaralat2.php';
        </script>";
    } else {

        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'daftaralat.php';
        </script>";
    }
} else {
    if ($_SESSION['status']) {
        echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'daftaralat2.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'daftaralat.php';
        </script>";
    }
}
