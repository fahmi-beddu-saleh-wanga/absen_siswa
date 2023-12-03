<!-- view_subjects.php -->

<?php 
include "koneksi.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Data Mata Pelajaran</title>
</head>
<body>

<div class="container mt-4">
    <h2>Data Mata Pelajaran</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Mata Pelajaran</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $db->query("SELECT * FROM subjects");

        // Menangani kesalahan query
        if ($result === false) {
            die("Query error: " . $db->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['subject_name']}</td>
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