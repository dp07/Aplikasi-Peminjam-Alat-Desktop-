<?php
require 'function.php';
session_start();

// cek apakah sudah login
// if (!isset($_SESSION['username'])) {
//     header('Location: login.php');
// }

// tangkap id dari url
$id = $_GET['id'];

// cari siswa berdasarkan id
$alat = getAlatById($id);

// set error
$err = 0;

// cek apakah data berhasil di insert
if (isset($_POST["mkeranjang"])) {
    if (keranjangAlat($_POST) > 0) {
        echo "<script>
            alert('Data alat berhasil dimasukan keranjang');
            document.location.href = 'daftaralat.php';
        </script>";
    } else {
        $err = 1;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="../asset/css/style.css">

    <title>Keranjang Alat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Sistem Peminjaman Alat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                </li>
            </ul>
            <a class="nav-link" href="admin/login.php">Login</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h5 class="mt-5">Form Peminjaman Alat</h5>
                <?php
                if ($err == 1) {
                    echo '<div class="alert alert-danger" role="alert">
                            Data gagal diproses!!!
                        </div>';
                }
                ?>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $alat['id']; ?>">
                    <input type="hidden" name="nis" value="<?= $_SESSION['nis']; ?>">
                    <input type="hidden" name="nama" value="<?= $_SESSION['nama']; ?>">
                    <input type="hidden" name="kode_alat" value="<?= $alat['kode_alat']; ?>">
                    <input type="hidden" name="nama_alat" value="<?= $alat['nama_alat']; ?>">
                    <input type="hidden" name="jumlah" value="<?= $alat['jumlah']; ?>">
                    <div class="form-group">
                        <label for="kode_alat">Kode Alat</label>
                        <input type="text" class="form-control" id="kode_alat" placeholder="Masukan kode alat" name="kode_alat" required autofocus value="<?= $alat['kode_alat']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_alat">Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" placeholder="Masukan nama alat" name="nama_alat" required value="<?= $alat['nama_alat']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Tersedia</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="Masukan jumlah" name="jumlah" value="<?= $alat['jumlah']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jpinjam">jumlah</label>
                        <input type="number" class="form-control" id="jpinjam" placeholder="Masukan jumlah yang ingin dipinjam" name="jpinjam" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="mkeranjang">Kirim</button>
                    <a href="daftaralat.php" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../asset/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>