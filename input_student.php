<!-- input_student.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Input Data Siswa</title>
</head>
<body>

<div class="container mt-4">
    <h2>Input Data Siswa</h2>
    <form action="process_student.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Siswa:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="class_id" class="form-label">Kelas:</label>
        <select class="form-select" name="class_id" required>
            <!-- Isi dropdown dengan opsi kelas dari database -->
            <?php
            // Sambungkan ke database Anda
            include 'koneksi.php';

            // Ambil data kelas dari tabel classes
            $query = "SELECT id, class_name FROM classes";
            $result = $db->query($query);

            // Periksa apakah query berhasil
            if ($result) {
                // Tampilkan opsi untuk setiap kelas
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['class_name']}</option>";
                }

                // Bebaskan hasil query
                $result->free();
            } else {
                // Tampilkan pesan kesalahan jika query gagal
                echo "Error: " . $db->error;
            }

            // Tutup koneksi ke database
            $db->close();
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<a href="bootstrapdashboard/home.php" class="btn btn-secondary">Kembali</a>
   
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
