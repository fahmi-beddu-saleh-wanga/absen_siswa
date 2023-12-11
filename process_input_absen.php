<?php
include "koneksi.php";
// Memeriksa apakah data telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $hari = $_POST["hari"];
    $keterangan = $_POST["keterangan"];

    // Menyimpan data ke dalam tabel absen
    $query = "INSERT INTO absen (nama_siswa, kelas, mata_pelajaran, hari, keterangan) VALUES ('$nama_siswa', '$kelas', '$mata_pelajaran', '$hari', '$keterangan')";

    if ($db->query($query) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }

    // Alihkan ke halaman view_reports.php
    header("Location: absen_siswa.php");
    exit();
}

$db->close();
?>