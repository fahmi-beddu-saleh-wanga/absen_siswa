<?php
session_start();
if (isset($_SESSION['status'])) {
    header("Location:bootstrapdashboard/home.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" href="stylee.css">

    <title>Absensi</title>
  </head>
  <body>

   <div class="global-container">
        <div class="card login-form">
                <div class="card-body">
                        <h1 class="card-title text-center">SELAMAT DATANG</h1>
                </div>
                <div class="card-text">
                    <form action="ceklogin.php?" method="POST">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                          </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                       
                      </form>
                </div>
        </div>
   </div>

  </body>
</html>
