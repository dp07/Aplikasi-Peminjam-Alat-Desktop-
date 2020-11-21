<?php
require '../function.php';

// tangkap id dari url
$id = $_GET['id'];

// cek apakah data behasil dihapus
if (hapusAlat($id) > 0) {
    echo "<script>
        alert('Data alat berhasil dihapus');
        document.location.href = 'alat.php';
    </script>";
} else {
    echo "<script>
        alert('Data alat gagal dihapus');
        document.location.href = 'alat.php';
    </script>";
}
