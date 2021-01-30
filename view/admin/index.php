<?php
require '../function.php';
session_start();

// cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// jumlah siswa
$jmlSiswa = jumlahDataSiswa();

// jumlah alat
$jmlAlat = jumlahDataAlat();

// jumlah alat dipinjam
$jmlAlatDipinjam = jumlahDataAlatDipinjman();

// jumlah guru
$jmlGuru = jumlahDataGuru();

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
                    <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                </li>
            </ul>
            <a class="nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin?');">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Selamat datang Admin</h5>
                        <p class="card-text">Selamat bekerja, semangat ya!!!</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="user.php">User</a>
                        </li>
                        <li class=" list-group-item">
                            <a href="guru.php">Guru</a>
                        </li>
                        <li class=" list-group-item">
                            <a href="alat.php">Alat</a>
                        </li>
                        <li class=" list-group-item">
                            <a href="peminjaman.php">Peminjaman</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-9">

                <div class="card d-inline-block ml-4" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Jumlah: <?= $jmlSiswa; ?></p>
                        <a href="user.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>

                <div class="card d-inline-block ml-4" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Guru</h5>
                        <p class="card-text">Jumlah: <?= $jmlGuru; ?></p>
                        <a href="user.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>

                <div class="card d-inline-block ml-4" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Alat</h5>
                        <p class="card-text">Jumlah: <?= $jmlAlat; ?></p>
                        <a href="alat.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>

                <div class="card d-inline-block ml-4 mt-3" style="width: 18rem;">
                    <img src="../../asset/img/cr7.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Peminjaman</h5>
                        <p class="card-text">Jumlah: <?= $jmlAlatDipinjam; ?></p>
                        <a href="peminjaman.php" class="btn btn-primary">Lihat Detail</a>
                    </div>
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