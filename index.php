<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Absensi Siswa Dashboard</title>
</head>
<body>

<div class="container mt-4">
    <h1>Absensi Siswa Dashboard</h1>

    <div class="row mt-4">
        <div class="col-md-3">
            <h3>Data Siswa</h3>
            <a href="view_students.php" class="btn btn-primary">Lihat Data Siswa</a>
            <a href="input_student.php" class="btn btn-success">Input Data Siswa</a>
        </div>
        <div class="col-md-3">
            <h3>Data Kelas</h3>
            <a href="view_classes.php" class="btn btn-primary">Lihat Data Kelas</a>
            <a href="input_class.php" class="btn btn-success">Input Data Kelas</a>
        </div>
        <div class="col-md-3">
            <h3>Data Mata Pelajaran</h3>
            <a href="view_subjects.php" class="btn btn-primary">Lihat Data Mata Pelajaran</a>
            <a href="input_subject.php" class="btn btn-success">Input Data Mata Pelajaran</a>
        </div>
        <div class="col-md-3">
            <h3>Absen Siswa</h3>
            <a href="view_absen.php" class="btn btn-primary">Lihat Absen Siswa</a>
            <a href="input_absen.php" class="btn btn-success">Input Absen Siswa</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
