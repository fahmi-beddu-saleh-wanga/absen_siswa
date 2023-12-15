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
                    <a class="dropdown-item" href="../input_absen.php">Input Data Siswa</a>
                    <a class="dropdown-item" href="../absen_siswa.php">Absen Siswa</a>
                </div>
            </li>
            <!-- Tambahkan dropdown dan link untuk menu lainnya -->
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

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <h2 class="fs-5">Dashboard</h2>
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
            <p>
Absen siswa adalah proses pencatatan kehadiran dan ketidakhadiran siswa di sekolah atau tempat pendidikan lainnya. Sistem absensi digunakan untuk memantau dan mencatat apakah seorang siswa hadir, izin, sakit, atau tidak masuk ke sekolah.

Umumnya, proses absensi dilakukan pada setiap sesi pembelajaran atau hari sekolah. Cara tradisional absensi dilakukan dengan catatan manual, tetapi seiring berkembangnya teknologi, banyak sekolah yang menggunakan sistem absensi digital. </p>

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
