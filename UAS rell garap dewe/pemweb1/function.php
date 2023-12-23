<?php
// Koneksi Database
$aaaa = mysqli_connect("localhost", "root", "", "4122042");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $aaaa;

    $result = mysqli_query($aaaa, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $aaaa;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "INSERT INTO mahasiswa(nim, nama, kelas, jurusan, semester, alamat) VALUES ('$nim','$nama','$kelas','$jurusan','$semester','$alamat')";

    mysqli_query($aaaa, $sql);

    return mysqli_affected_rows($aaaa);
}

// Membuat fungsi hapus
function hapus($nim)
{
    global $aaaa;

    mysqli_query($aaaa, "DELETE FROM mahasiswa WHERE nim = $nim");
    return mysqli_affected_rows($aaaa);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $aaaa;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' , alamat = '$alamat' WHERE nim = $nim";

    mysqli_query($aaaa, $sql);

    return mysqli_affected_rows($aaaa);
}

