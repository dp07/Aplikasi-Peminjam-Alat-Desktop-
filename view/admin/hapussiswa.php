<?php 
require '../function.php';

// tangkap id dari url
$id = $_GET['id'];

// cek apakah data behasil dihapus
if(hapusSiswa($id) > 0){
    echo "<script>
        alert('Data siswa berhasil dihapus');
        document.location.href = 'user.php';
    </script>";
} else {
    echo "<script>
        alert('Data siswa gagal dihapus');
        document.location.href = 'user.php';
    </script>";
}
