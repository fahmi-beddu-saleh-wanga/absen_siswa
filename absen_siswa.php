<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* ... (gaya CSS tetap sama) ... */
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id_absen = $_POST["id"];
    $new_keterangan = $_POST["new_keterangan"];

    // Query untuk melakukan update keterangan
    $query_update = "UPDATE absen SET keterangan = '$new_keterangan' WHERE id = $id_absen";

    // Eksekusi query
    if ($db->query($query_update) === TRUE) {
        $update_success = true;
    } else {
        $update_error = "Error: " . $query_update . "<br>" . $db->error;
    }
}


// Menangani aksi hapus jika data disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];

    // Query untuk menghapus data absen
    $query_delete = "DELETE FROM absen WHERE id = $delete_id";

    // Eksekusi query
    if ($db->query($query_delete) === TRUE) {
        $delete_success = true;
    } else {
        $delete_error = "Error: " . $query_delete . "<br>" . $db->error;
    }
}

// Query untuk mengambil data absensi
$query_absen = "SELECT * FROM absen";
$result_absen = $db->query($query_absen);

// Memeriksa apakah query berhasil dijalankan
if (!$result_absen) {
    die("Error: " . $db->error);
}
?>

    <h2>Data Absensi Siswa</h2>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Keterangan</th>
                <th>Aksi</th> <!-- Tambah kolom aksi untuk tombol Update dan Hapus -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data absensi
            $i=0;
            while ($row = $result_absen->fetch_assoc()) {
                $i += 1;
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['nama_siswa']}</td>
                        <td>{$row['kelas']}</td>
                        <td>{$row['mata_pelajaran']}</td>
                        <td>{$row['hari']}</td>
                        <td>
                            <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='text' name='new_keterangan' value='{$row['keterangan']}'>
                                <button type='submit' class='btn btn-primary btn-sm'>Update</button>
                            </form>
                        </td>
                        <td>
                            <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus data?\");'>
                                <input type='hidden' name='delete_id' value='{$row['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                            </form>
                        </td>
                    </tr>";
            }

            // Bebaskan hasil query
            $result_absen->free();
            ?>
        </tbody>
    </table>

    <!-- Modal Sukses -->
    <?php if ($update_success) : ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Data berhasil diupdate!</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Hapus Sukses -->
    <?php if ($delete_success) : ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Data berhasil dihapus!</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Error -->
    <?php if ($update_error) : ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?php echo $update_error; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Hapus Error -->
    <?php if ($delete_error) : ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?php echo $delete_error; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <a href="bootstrapdashboard/home.php" class="btn btn-secondary">Kembali</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
