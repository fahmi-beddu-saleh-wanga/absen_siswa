<!-- view_classes.php -->
<?php 
include "koneksi.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Data Kelas</title>
</head>
<body>

<div class="container mt-4">
    <h2>Data Kelas</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kelas</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Menggunakan objek $db yang telah Anda buat sebelumnya
        $result = $db->query("SELECT * FROM classes");

        if ($result === false) {
            die("Query error: " . $db->error);
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['class_name']}</td>
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