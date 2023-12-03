<!-- input_class.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Input Data Kelas</title>
</head>
<body>

<div class="container mt-4">
    <h2>Input Data Kelas</h2>
    <form action="process_class.php" method="post">
        <div class="mb-3">
            <label for="class_name" class="form-label">Nama Kelas:</label>
            <input type="text" class="form-control" name="class_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
