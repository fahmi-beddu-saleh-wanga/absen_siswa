<!-- input_subject.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Input Data Mata Pelajaran</title>
</head>
<body>

<div class="container mt-4">
    <h2>Input Data Mata Pelajaran</h2>
    <form action="process_subject.php" method="post">
        <div class="mb-3">
            <label for="subject_name" class="form-label">Nama Mata Pelajaran:</label>
            <input type="text" class="form-control" name="subject_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
