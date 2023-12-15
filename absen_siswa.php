<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #007bff;
        }

        table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 100%;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        tbody tr:hover {
            background-color: #e6f7ff;
            transition: background-color 0.3s ease-in-out;
        }

        form {
            display: inline;
        }

        select {
            width: 120px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .btn {
            margin-right: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }

        .modal-dialog {
            max-width: 300px;
        }

        .modal-content {
            text-align: center;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            color: #ffffff;
        }
    </style>
    <title>Absen Siswa</title>
</head>
<body>

<?php
include "koneksi.php";

// Menangani aksi edit jika data disubmit
$update_success = false;
$update_error = "";

$delete_id = "";
$delete_success = false;
$delete_error = "";

// Filter berdasarkan Mata Pelajaran jika diatur di URL
$filter_subject = isset($_POST['subjectFilter']) ? $_POST['subjectFilter'] : '';

// Query untuk mengambil data absen dengan atau tanpa filter Mata Pelajaran
$query_absen = $db->prepare("SELECT * FROM absen " . ($filter_subject ? "WHERE mata_pelajaran = ?" : ""));
if ($filter_subject) {
    $query_absen->bind_param("s", $filter_subject);
}
$query_absen->execute();
$result_absen = $query_absen->get_result();

// Memeriksa apakah query berhasil dijalankan
if (!$result_absen) {
    die("Error: " . $db->error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id_absen = $_POST["id"];
    $new_keterangan = $_POST["new_keterangan"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query_update = $db->prepare("UPDATE absen SET keterangan = ? WHERE id = ?");
    $query_update->bind_param("si", $new_keterangan, $id_absen);

    // Eksekusi query
    if ($query_update->execute()) {
        $update_success = true;
    } else {
        $update_error = "Error: " . $query_update->error;
    }

    $query_update->close();

    $message = "Data berhasil diupdate";
}

// Menangani aksi hapus jika data disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query_delete = $db->prepare("DELETE FROM absen WHERE id = ?");
    $query_delete->bind_param("i", $delete_id);

    // Eksekusi query
    if ($query_delete->execute()) {
        $delete_success = true;
    } else {
        $delete_error = "Error: " . $query_delete->error;
    }

    $query_delete->close();
}

$query = "SELECT * FROM absen";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["subjectFilter"]) && $_POST["subjectFilter"] !== "") {
    $filter = $_POST['subjectFilter'];
    $query .= " WHERE mata_pelajaran = '$filter'";
}

// Gunakan prepared statement untuk mencegah SQL injection
$query_absen = $db->prepare($query);
$query_absen->execute();
$result_absen = $query_absen->get_result();

// Memeriksa apakah query berhasil dijalankan
if (!$result_absen) {
    die("Error: " . $db->error);
}
?>

    <h2>Data Absensi Siswa</h2>

   <!-- Form untuk Filter Mata Pelajaran -->
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="subjectFilter">Filter berdasarkan Mata Pelajaran:</label>
        <select name="subjectFilter" id="subjectFilter" class="form-select">
            <option value="">-- Semua Mata Pelajaran --</option>
            <?php
            // Ambil nilai distinct Mata Pelajaran dari database
            $query_subjects = $db->prepare("SELECT DISTINCT mata_pelajaran FROM absen");
            $query_subjects->execute();
            $result_subjects = $query_subjects->get_result();

            while ($row_subject = $result_subjects->fetch_assoc()) {
                $selected = (isset($_POST['subjectFilter']) && $_POST['subjectFilter'] == $row_subject['mata_pelajaran']) ? 'selected' : '';
                echo "<option value='{$row_subject['mata_pelajaran']}' {$selected}>{$row_subject['mata_pelajaran']}</option>";
            }

            $query_subjects->close();
            ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data absensi
            $i = 0;
            while ($row = $result_absen->fetch_assoc()) {
                $i += 1;
                echo "<tr>
                <td>{$i}</td>
                <td>{$row['nama_siswa']}</td>
                <td>{$row['nis']}</td>
                <td>{$row['kelas']}</td>
                <td>{$row['mata_pelajaran']}</td>
                <td>{$row['hari']}</td>
                <td>
                    <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <select name='new_keterangan' class='form-select'>
                            <option value='Hadir'" . ($row['keterangan'] == 'Hadir' ? ' selected' : '') . ">Hadir</option>
                            <option value='Izin'" . ($row['keterangan'] == 'Izin' ? ' selected' : '') . ">Izin</option>
                            <option value='Sakit'" . ($row['keterangan'] == 'Sakit' ? ' selected' : '') . ">Sakit</option>
                            <option value='Bolos'" . ($row['keterangan'] == 'Bolos' ? ' selected' : '') . ">Bolos</option>
                            <option value='Alpa'" . ($row['keterangan'] == 'Alpa' ? ' selected' : '') . ">Alpa</option>
                        </select>
                        <button type='submit' class='btn btn-primary btn-sm'>Update</button>
                    </form>
                </td>
                <td>
            </tr>";            
            }

            // Bebaskan hasil query
            $result_absen->free();
            ?>
        </tbody>
    </table>

    <!-- ... (Bagian HTML lainnya tetap sama seperti yang telah Anda berikan) ... -->
    
    <a href="bootstrapdashboard/home.php" class="btn btn-secondary">Kembali</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if ($message !== "") : ?>
            alert("<?= $message ?>")
            <?php endif ?>
        });

        </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
