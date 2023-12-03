<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Data Absensi</title>
</head>
<body>

<div class="container mt-4">
    <h2>Data Absensi</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Hari</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Menggunakan JOIN untuk mendapatkan informasi dari berbagai tabel
        $result = $db->query("SELECT absensi.id, students.name AS nama_siswa, classes.class_name AS nama_kelas, subjects.subject_name AS mata_pelajaran, absensi.hari, absensi.keterangan FROM absensi 
            INNER JOIN students ON absensi.student_id = students.id
            INNER JOIN classes ON absensi.class_id = classes.id
            INNER JOIN subjects ON absensi.subject_id = subjects.id");

        // Menangani kesalahan query
        if ($result === false) {
            die("Query error: " . $db->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nama_siswa']}</td>
                        <td>{$row['nama_kelas']}</td>
                        <td>{$row['mata_pelajaran']}</td>
                        <td>{$row['hari']}</td>
                        <td>{$row['keterangan']}</td>
                      </tr>";
        }

        $result->close(); // Tutup result set
        ?>
        </tbody>
    </table>

    <button class="btn btn-primary" onclick="printAbsen()">Print</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function printAbsen() {
        window.print();
    }
</script>

</body>
</html>
