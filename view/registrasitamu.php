<?php
require 'function.php';
session_start();

// set hasil
$hasil = 0;

// set error
$err = 0;

// cek apakah data berhasil di insert
if (isset($_POST["ttamu"])) {
    if (tambahTamu($_POST) > 0) {
        $_SESSION['nis'] = $_POST['nis'];
        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['kelas'] = $_POST['kelas'];
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
            <a class="nav-link" href="admin/login.php">Login</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="search">
                <div>
                    <h5>Form Registrasi Tamu</h5>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="kelas" id="kelas" value="Tamu">
                    <input type="hidden" name="angkatan" id="angkatan" value="<?= date('Y-m-d'); ?>">
                    <div class="form-group">
                        <label for="nis">Password</label>
                        <input type="password" class="form-control" id="nis" placeholder="Masukan password" name="nis" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input type="number" class="form-control" id="hp" placeholder="Masukan hp" name="hp" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="ttamu">Kirim</button>
                    <a href="cektamu.php?status=no" class="btn btn-primary float-right mr-3">Kembali</a>
                </form>
            </div>
        </div>
        <?php
        if ($err == 1) {
            echo '<div class="alert alert-danger mt-5 mx-auto" style="width: 72%;" role="alert">
                Password sudah digunakan, silahkan cari kata yang lain!!!
              </div>';
        }
        ?>
        <?php if ($hasil == 1) : ?>
            <div class="table1 mx-auto mt-5" style="width: 70%;">
                <table class="table">
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" width="100">Nama</th>
                            <td>: <?= $_POST['nama']; ?></td>

                        </tr>
                        <tr>
                            <th scope="row" width="100">Status</th>
                            <td>: <?= $_POST['kelas']; ?></td>

                        </tr>
                    </tbody>
                </table>
                <?php if ($_GET['status'] == 'pengembalian') : ?>
                    <?php $_SESSION['status'] = $_GET['status']; ?>
                    <a href="daftaralat2.php" class="btn btn-success float-right">Selanjutnya</a>
                <?php else : ?>
                    <a href="daftaralat.php" class="btn btn-primary float-right">Selanjutnya</a>
                <?php endif; ?>
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