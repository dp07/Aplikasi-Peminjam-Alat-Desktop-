<?php
require '../function.php';
session_start();

// tangkap id dari url
$id = $_GET['id'];
$kode_alat = $_GET['kode'];

// var_dump($_SESSION['status']);
// die();

// cek apakah data behasil dihapus
if (hapusDaftarPinjam($id, $kode_alat) > 0) {
    echo "<script>
        alert('Data alat berhasil dihapus');
        document.location.href = 'peminjaman.php';
    </script>";
} else {
    echo "<script>
        alert('Data alat gagal dihapus');
        document.location.href = 'peminjaman.php';
    </script>";
}
