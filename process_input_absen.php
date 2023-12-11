<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $kelas = $_POST["kelas"];
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $hari = $_POST["hari"];
    $keterangan = $_POST["keterangan"];

    // Simpan data ke dalam tabel absensi
    $query = $db->prepare("INSERT INTO absensi (student_id , jenis_kelamin, class_id, subject_id, hari, keterangan) VALUES (?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssss", $nama, $jenis_kelamin, $kelas, $mata_pelajaran, $hari, $keterangan);

    if (!$query->execute()) {
        die("Query execution failed: " . $query->error);
    }

    $query->close();

    // Alihkan ke halaman view_reports.php
    header("Location: view_absen.php");
    exit();
}

$db->close();
?>
