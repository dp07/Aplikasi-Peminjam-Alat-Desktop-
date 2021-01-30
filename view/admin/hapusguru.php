<?php
require '../function.php';

// tangkap id dari url
$id = $_GET['id'];

// cek apakah data behasil dihapus
if (hapusSiswa($id) > 0) {
    echo "<script>
        alert('Data guru berhasil dihapus');
        document.location.href = 'guru.php';
    </script>";
} else {
    echo "<script>
        alert('Data guru gagal dihapus');
        document.location.href = 'guru.php';
    </script>";
}
