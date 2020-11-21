<?php
require '../function.php';
session_start();

// cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// tangkap id dari url
$id = $_GET['id'];

// cari siswa berdasarkan id
$siswa = getSiswaById($id);

// set error
$err = 0;

// cek apakah data berhasil di insert
if (isset($_POST["esiswa"])) {
    if (editSiswa($_POST) > 0) {
        echo "<script>
            alert('Data siswa berhasil diubah');
            document.location.href = 'user.php';
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
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="../../asset/css/style.css">

    <title>Selamat Datang</title>
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
                    <a class="nav-link" href="tentangkami.php">Tentang kami</a>
                </li>
            </ul>
            <a class="nav-link" href="logout.php" onclick="confirm('Apakah anda yakin?');">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Selamat datang Admin</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="user.php">User</a>
                        </li>
                        <li class=" list-group-item">
                            <a href="alat.php">Alat</a>
                        </li>
                        <li class=" list-group-item">
                            <a href="alat.php">Peminjaman</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="pl-4">
                    <h5>Tambah Data Siswa</h5>
                    <?php
                    if ($err == 1) {
                        echo '<div class="alert alert-danger" role="alert">
                            Data gagal diubah!!!
                        </div>';
                    }
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" id="nis" placeholder="Masukan NIS" name="nis" required autofocus value="<?= $siswa['nis']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama" required value="<?= $siswa['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" placeholder="Masukan kelas" name="kelas" value="<?= $siswa['kelas']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="date" class="form-control" id="angkatan" placeholder="Masukan angkatan" name="angkatan" required value="<?= $siswa['angkatan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="hp">HP</label>
                            <input type="number" class="form-control" id="hp" placeholder="Masukan hp" name="hp" required value="<?= $siswa['hp']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="esiswa">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../../asset/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../asset/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>