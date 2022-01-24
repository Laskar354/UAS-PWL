<?php

require '../prosedur.php';

if(isset($_POST['tambah'])){

    if(tambah_admin($_POST) > 0 ){
        echo "<script>
                alert('Admin Baru Berhasil Ditambahkan');
              </script>";
    } else {

        echo mysqli_error($conn);
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Find Knowledge</title>
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Find Knowledge</a>
            <form class="d-flex">
                <button class="btn btn-outline-success" type="submit" onclick="document.location='registrasi.php'">Mulai</button>
            </form>
        </div>
    </nav>

    <section class="form">
        <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header bg-success">
                Registrasi Terlebih Dahulu
                <form class="d-flex">
                    <a href="registration.php" class="btn btn-outline-success">Mulai</a>
                </form>
            </div>
            
            <div class="card-body align-content-lg-center mt-5">
                <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-12 mx-auto mb-4">
                        <input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control" id="name" placeholder="Masukkan Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password2" class="form-control" id="name" placeholder="Ulangi Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                    </div>
                    <div class="col-sm-12 mt-5">
                        <button class="btn btn-success" name="tambah" type="submit">Tambah</button>
                    </div>
                    <div class="col-sm-12 mt-2">
                    <a href="login_admin.php" class="btn btn-outline-success">Login</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>