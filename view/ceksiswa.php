<?php
require 'function.php';

// set hasil
$hasil = 0;

// set error
$err = 0;

// cari berdasarkan nis
if (isset($_POST['cari'])) {
    $siswa = cariSiswaByNis($_POST['nis']);
    if ($siswa != null) {
        $hasil = 1;
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

    <title>Selamat Datang</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Sistem Peminjaman Alat</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                </li>
            </ul>
            <a class="nav-link btn btn-sm btn-primary" href="admin/login.php">Login</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="search">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Masukan NIS" name="nis" autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="cari">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if ($err == 1) {
            echo '<div class="alert alert-danger mt-5 mx-auto" style="width: 72%;" role="alert">
                Data tidak ditemukan!!!
              </div>';
        }
        ?>
        <?php if ($hasil == 1) : ?>
            <div class="table1 mx-auto mt-5" style="width: 70%;">
                <!-- <div class="row table1"> -->
                <table class="table">
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" width="100">NIS</th>
                            <td>: <?= $siswa['nis']; ?></td>

                        </tr>
                        <tr>
                            <th scope="row" width="100">Nama</th>
                            <td>: <?= $siswa['nama']; ?></td>

                        </tr>
                        <tr>
                            <th scope="row" width="100">Kelas</th>
                            <td>: <?= $siswa['kelas']; ?></td>

                        </tr>
                    </tbody>
                </table>
                <!-- </div> -->
                <a href="daftaralat.php" class="btn btn-primary float-right">Selanjutnya</a>
            </div>
        <?php endif; ?>
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