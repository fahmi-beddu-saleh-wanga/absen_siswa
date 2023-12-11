<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: black; /* Warna hitam */
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        select {
            cursor: pointer;
        }

        button {
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
    <title>Absen siswa</title>
</head>
<body>

<h2>Absensi</h2>
    <form method="POST" action="process_input_absen.php"> <!-- Tambahkan action di sini -->
        <label for="nama">Nama Siswa:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" required>

        <label for="mata_pelajaran">Mata Pelajaran:</label>
        <input type="text" name="mata_pelajaran" id="mata_pelajaran" required>

        <label for="hari">Hari:</label>
        <select name="hari" id="hari" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
        </select>

        <label for="keterangan">Keterangan:</label>
        <select name="keterangan" id="keterangan" required>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Hadir">Hadir</option>
            <option value="Bolos">Bolos</option>
            <option value="Alpa">Alpa</option>
        </select>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="bootstrapdashboard/home.php" class="btn btn-secondary">Kembali</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
