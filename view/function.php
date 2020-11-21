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



// ---------------------------------------------------------------
// tampilkan alat
function alat($awalData, $jmlDataPerHalaman)
{
    global $conn;
    $alat = mysqli_query($conn, "SELECT * FROM alat GROUP BY id ORDER BY id DESC LIMIT $awalData, $jmlDataPerHalaman ");
    return $alat;
}

// jumlah data alat
function jumlahDataAlat()
{
    global $conn;

    // hitung jumlah data alat
    $sql = "SELECT * FROM alat";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// tambah alat
function tambahAlat($data)
{
    global $conn;

    // ambil data dari form
    $kode_alat = htmlspecialchars($data["kode_alat"]);
    $nama_alat = htmlspecialchars($data["nama_alat"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    // insert ke dalam database
    $sql = "INSERT INTO alat (kode_alat, nama_alat, jumlah) VALUES ('$kode_alat', '$nama_alat', $jumlah)";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// cari alat
function cariAlat($keyword)
{
    global $conn;

    // cari siswa berdasarkan keyword
    $sql = "SELECT * FROM alat WHERE 
            kode_alat LIKE '%$keyword%' OR
            nama_alat LIKE '%$keyword%' OR
            jumlah LIKE '%$keyword%'";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// hapus alat
function hapusAlat($id)
{
    global $conn;

    // hapus data dalam database
    $sql = "DELETE FROM alat WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// dapatkan siswa bedasarkan id
function getAlatById($id)
{
    global $conn;

    // cari siswa berdasarkan id
    $sql = "SELECT * FROM alat WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}

// edit alat
function editAlat($data)
{
    global $conn;

    // ambil data dari form
    $id = $data['id'];
    $kode_alat = htmlspecialchars($data["kode_alat"]);
    $nama_alat = htmlspecialchars($data["nama_alat"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    // update ke dalam database
    $sql = "UPDATE alat SET
            kode_alat = '$kode_alat',
            nama_alat = '$nama_alat',
            jumlah = '$jumlah'
            WHERE id = $id";

    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// -------------------------------------------------------------------

// update jumlah alat
function updateJumlahAlat($id, $jml)
{
    global $conn;
    $sql = "UPDATE alat SET
            jumlah = '$jml'
            WHERE id = $id";

    $query = mysqli_query($conn, $sql);
}

// tambah data ke tabel peminjaman
function keranjangAlat($data)
{
    global $conn;

    // ambil data dari form
    $id = htmlspecialchars($data["id"]);
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $kode_alat = htmlspecialchars($data["kode_alat"]);
    $nama_alat = htmlspecialchars($data["nama_alat"]);
    $sjumlah = intval($data["jumlah"]);
    $jumlah = intval($data["jpinjam"]);
    $tanggal = date('Y/d/m');

    if ($jumlah > $sjumlah or $jumlah <= 0) {
        return 0;
    }

    // update jumlah alat
    $jml = $sjumlah - $jumlah;
    updateJumlahAlat($id, $jml);

    // insert ke dalam database
    $sql = "INSERT INTO peminjaman (nis_user, nama_user, kode_alat, nama_alat, jumlah, tanggal) VALUES ('$nis', '$nama', '$kode_alat', '$nama_alat', $jumlah, '$tanggal')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

// tampilkan daftar pinjam
function daftarPinjam($nis)
{
    global $conn;
    $alat = mysqli_query($conn, "SELECT * FROM peminjaman WHERE nis_user = '$nis' GROUP BY id ORDER BY id DESC");
    return $alat;
}

// hapus daftar pinjam
function hapusDaftarPinjam($id, $kode_alat)
{
    global $conn;

    $sql = mysqli_query($conn, "SELECT jumlah FROM  peminjaman WHERE id = $id ");
    $jml = mysqli_fetch_assoc($sql);
    // jumlah data pada tabel peminjaman
    $jml = intval($jml['jumlah']);

    $sql = mysqli_query($conn, "SELECT jumlah FROM alat WHERE kode_alat = '$kode_alat'");
    $jml2 = mysqli_fetch_assoc($sql);
    // jumlah adata pada tabel alat
    $jml2 = intval($jml2['jumlah']);

    $jmlBaru = $jml + $jml2;
    // updata jumlah pada tabel alat
    $sql = mysqli_query($conn, "UPDATE alat SET jumlah = $jmlBaru WHERE kode_alat = '$kode_alat'");

    // hapus data dalam database
    $sql = "DELETE FROM peminjaman WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}
