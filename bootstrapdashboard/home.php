<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleee.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Absen Siswa</title>
</head>
<body>
<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">AS</span> <span
                        class="text-white">Absen Siswa</span></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fal fa-stream"></i></button>
        </div>

        <ul class="list-unstyled px-2">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle text-decoration-none px-3 py-2 d-block" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Siswa
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../view_students.php">Lihat Data Siswa</a>
                    <a class="dropdown-item" href="../input_student.php">Input Data Siswa</a>
                </div>
            </li>
            <!-- Tambahkan dropdown dan link untuk menu lainnya -->

 		<li class="dropdown">
                <a href="#" class="dropdown-toggle text-decoration-none px-3 py-2 d-block" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Kelas
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../view_classes.php">Lihat Data Kelas</a>
                    <a class="dropdown-item" href="../input_class.php">Input Data Kelas</a>
               </div>


 		<li class="dropdown">
                <a href="#" class="dropdown-toggle text-decoration-none px-3 py-2 d-block" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Mata Pelajaran
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../view_subjects.php">Lihat Data Mata Pelajaran</a>
                    <a class="dropdown-item" href="../input_subject.php">Input Data Mata Pelajaran</a>
                </div>

 		<li class="dropdown">
                <a href="#" class="dropdown-toggle text-decoration-none px-3 py-2 d-block" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Data Absen
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../view_absen.php">Lihat Data Absen</a>
                    <a class="dropdown-item" href="../input_absen.php">Input Data Absen</a>
                </div>
        </ul>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                    <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fal fa-bars"></i>
                </button>
               <!-- ... (Bagian lain dari HTML tetap sama) -->

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- Ganti link Profile dengan Logout -->
                            <a class="nav-link" href="../index.php">Logout</a>
                        </li>
                        <!-- Tambahkan item navbar lain sesuai kebutuhan -->
                    </ul>
                </div>

<!-- ... (Bagian lain dari HTML tetap sama) -->

            </div>
        </nav>
        

        <div class="dashboard-content px-3 pt-4">
            <h2 class="fs-5"> Dashboard</h2>

            <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Siswa</h5>
                    <?php
                    include "../koneksi.php";
                        $result_students = $db->query("SELECT COUNT(*) AS total_students FROM students");
                        $row_students = $result_students->fetch_assoc();
                        echo "<p class='card-text'>{$row_students['total_students']}</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kelas</h5>
                    <?php
                        $result_classes = $db->query("SELECT COUNT(*) AS total_classes FROM classes");
                        $row_classes = $result_classes->fetch_assoc();
                        echo "<p class='card-text'>{$row_classes['total_classes']}</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mata Pelajaran</h5>
                    <?php
                        $result_subjects = $db->query("SELECT COUNT(*) AS total_subjects FROM subjects");
                        $row_subjects = $result_subjects->fetch_assoc();
                        echo "<p class='card-text'>{$row_subjects['total_subjects']}</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZZqVgj53PbwfbhWOOdgxAhr+GGlRXPqRZ9RlZBtZ+Jq2LTLd5mi5qScd" crossorigin="anonymous"></script>

<script>
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });

    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');
    });

    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');
    })
</script>
</body>
</html>