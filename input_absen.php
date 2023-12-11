<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Input Absen</title>
</head>
<body>

<div class="container mt-4">
    <form action="process_input_absen.php" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <select class="form-select" id="nama" name="nama" required>
                <?php
                include 'koneksi.php';
                // Query untuk mendapatkan data nama siswa dari tabel students
                $query_nama = "SELECT id, name FROM students";
                $result_nama = $db->query($query_nama);

                // Periksa apakah query berhasil
                if ($result_nama) {
                    // Tampilkan opsi untuk setiap nama siswa
                    while ($row_nama = $result_nama->fetch_assoc()) {
                        echo "<option value='{$row_nama['id']}'>{$row_nama['name']}</option>";
                    }

                    // Bebaskan hasil query
                    $result_nama->free();
                } else {
                    // Tampilkan pesan kesalahan jika query gagal
                    echo "Error: " . $db->error;
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" id="kelas" name="kelas" required>
                <?php
                // Query untuk mendapatkan data kelas dari tabel classes
                $query_kelas = "SELECT id, class_name FROM classes";
                $result_kelas = $db->query($query_kelas);

                // Periksa apakah query berhasil
                if ($result_kelas) {
                    // Tampilkan opsi untuk setiap kelas
                    while ($row_kelas = $result_kelas->fetch_assoc()) {
                        echo "<option value='{$row_kelas['id']}'>{$row_kelas['class_name']}</option>";
                    }

                    // Bebaskan hasil query
                    $result_kelas->free();
                } else {
                    // Tampilkan pesan kesalahan jika query gagal
                    echo "Error: " . $db->error;
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <select class="form-select" id="mata_pelajaran" name="mata_pelajaran" required>
            <?php
                // Query untuk mendapatkan data mata pelajaran dari tabel subjects
                $query_pelajaran = "SELECT id, subject_name FROM subjects";
                $result_pelajaran = $db->query($query_pelajaran);

                // Periksa apakah query berhasil
                if ($result_pelajaran) {
                    // Tampilkan opsi untuk setiap mata pelajaran
                    while ($row_pelajaran = $result_pelajaran->fetch_assoc()) {
                        echo "<option value='{$row_pelajaran['id']}'>{$row_pelajaran['subject_name']}</option>";
                    }

                    // Bebaskan hasil query
                    $result_pelajaran->free();
                } else {
                    // Tampilkan pesan kesalahan jika query gagal
                    echo "Error: " . $db->error;
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">hari</label>
            <select class="form-select" id="hari" name="hari" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select class="form-select" id="keterangan" name="keterangan" required>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Alpa">Alpa</option>
                <option value="Bolos">Bolos</option>
                <option value="Hadir">Hadir</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="bootstrapdashboard/home.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
