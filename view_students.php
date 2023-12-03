<?php 
include "koneksi.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Data Siswa</title>
</head>
<body>

<div class="container mt-4">
    <h2>Data Siswa</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>ID Kelas</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $db->query("SELECT * FROM students");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['class_id']}</td>
                      </tr>";
        }

        $result->close(); // Tutup result set
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>