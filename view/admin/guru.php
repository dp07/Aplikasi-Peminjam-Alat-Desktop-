<?php
require '../function.php';
session_start();

// cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$jmlDataPerHalaman = 10;
$jmlDataSiswa = jumlahDataGuru();
$jmlHalaman = ceil($jmlDataSiswa / $jmlDataPerHalaman);
$halamanAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jmlDataPerHalaman * $halamanAktif) - $jmlDataPerHalaman;

$siswa = guru($awalData, $jmlDataPerHalaman);

// cari berdasarkan keyword
if (isset($_POST['cari'])) {
    $siswa = cariGuru($_POST['keyword']);
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

    <title>Halaman User</title>
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentangkami.php">Tentang kami</a>
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
                        <li class="list-group-item">
                            <a href="guru.php">Guru</a>
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
                    <h5>Daftar Guru</h5>
                    <div class="row">
                        <div class="col">
                            <a href="tambahguru.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col">
                            <form action="" method="POST">
                                <div class="input-group float-left">
                                    <input type="text" class="form-control" placeholder="Masukan kata kunci" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="cari">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tahun Masuk</th>
                                <th scope="col">HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $awalData + 1; ?>
                            <?php while ($row = mysqli_fetch_assoc($siswa)) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $row['nis']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['kelas']; ?></td>
                                    <td><?= $row['angkatan']; ?></td>
                                    <td><?= $row['hp']; ?></td>
                                    <td>
                                        <a href="editguru.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="hapusguru.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php if ($jmlDataSiswa > 10) : ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if ($halamanAktif > 1) : ?>
                                    <li class="page-item"><a class="page-link" href="?hal=<?= $halamanAktif - 1; ?>">Previous</a></li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $jmlHalaman; $i++) : ?>
                                    <?php if ($i == $halamanAktif) : ?>
                                        <li class="page-item active"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php if ($halamanAktif < $jmlHalaman) : ?>
                                    <li class="page-item"><a class="page-link" href="?hal=<?= $halamanAktif + 1; ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
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