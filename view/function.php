<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "peminjaman_alat");

// tampilkan user
function siswa()
{
    global $conn;
    $siswa = mysqli_query($conn, 'SELECT * FROM siswa');
    // var_dump($siswa);
    return $siswa;
}

// tambah siswa
function tambahSiswa($data)
{
    global $conn;
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $hp = htmlspecialchars($data["hp"]);

    // var_dump($hp);

    // insert ke dalam database
    $query = "INSERT INTO siswa VALUES ('', $nis', '$nama', '$kelas', '$angkatan', '$hp')";

    mysqli_query($conn, $query);
    var_dump(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
