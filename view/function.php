<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "peminjaman_alat");

// tampilkan user
function siswa($awalData, $jmlDataPerHalaman)
{
    global $conn;
    $siswa = mysqli_query($conn, "SELECT * FROM siswa GROUP BY id ORDER BY id DESC LIMIT $awalData, $jmlDataPerHalaman ");
    // var_dump($siswa);
    return $siswa;
}

// jumlah data siswa
function jumlahDataSiswa()
{
    global $conn;

    // hitung jumlah data siswa
    $sql = "SELECT * FROM siswa";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// tambah siswa
function tambahSiswa($data)
{
    global $conn;

    // ambil data dari form
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $hp = htmlspecialchars($data["hp"]);

    // insert ke dalam database
    $sql = "INSERT INTO siswa (nis, nama, kelas, angkatan, hp) VALUES ('$nis', '$nama', '$kelas', '$angkatan', '$hp')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// dapatkan siswa bedasarkan id
function getSiswaById($id)
{
    global $conn;

    // cari siswa berdasarkan id
    $sql = "SELECT * FROM siswa WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}

// edit siswa
function editSiswa($data)
{
    global $conn;

    // ambil data dari form
    $id = $data['id'];
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $hp = htmlspecialchars($data["hp"]);

    // update ke dalam database
    $sql = "UPDATE siswa SET
            nis = '$nis',
            nama = '$nama',
            kelas = '$kelas',
            angkatan = '$angkatan',
            hp = '$hp'
            WHERE id = $id";

    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// hapus siswa
function hapusSiswa($id)
{
    global $conn;

    // hapus data dalam database
    $sql = "DELETE FROM siswa WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// cari siswa
function cariSiswa($keyword)
{
    global $conn;

    // cari siswa berdasarkan keyword
    $sql = "SELECT * FROM siswa WHERE 
            nis LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            kelas LIKE '%$keyword%' OR
            angkatan LIKE '%$keyword%'";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// cari siswa berdasarkan nis
function cariSiswaByNis($keyword)
{
    global $conn;

    // cari siswa berdasarkan nis
    $sql = "SELECT * FROM siswa WHERE 
            nis LIKE '$keyword'";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}
