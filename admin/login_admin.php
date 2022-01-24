<?php

session_start();
require '../prosedur.php';

// cek cookie, karena kita buat cookie = username maka cek usernamenya apakah sudah benar
if(isset($_COOKIE['id']) && isset($_COOKIE['nama'])){
    $id = $_COOKIE['id'];
    $nama = $_COOKIE['nama'];
    // ambil username berdasarkan id, samakan dulu apakah sudah sama dengan cookie uname
    $result = mysqli_query($conn, "SELECT nama, id_admin FROM admin WHERE id_admin = $id");
    $row = mysqli_fetch_assoc($result);
    
    // cek cookie dan username
    if($nama === hash("sha256", $row['nama'])){
        $_SESSION['login_admin'] = true;
        $_SESSION['id_admin'] = $row['id_admin'];
        
    }
    var_dump($_SESSION['id_admin']);die;
}

// cek session apakah masih ada
if(isset($_SESSION['login_admin'])){
    header("location:index.php");
    exit;
}



if(isset($_POST['login'])){
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    // cek username dan password apakah ada dalam database
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE nama = '$nama'");

    // cek username
    if(mysqli_num_rows($result) === 1){ // fungsi ini mengembalikan baris, jika ada maka hasilnya 1(seperti mysqli_affected_rows)
        // kalau ada cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {; // cek password apakah sama dengan password yg di enkripsi dari fungsi password_hash
            // set session
            $_SESSION['login_admin'] = true;
            $_SESSION['id_admin'] = $row['id_admin'];

            // cek cookie
            if(isset($_POST['ingat'])){
                //buat cookienya
                setcookie("id", $row['id_admin'], time()+3600);
                setcookie("nama", hash("sha256", $row['nama']), time()+3600);
            }

            header('location:index.php');
            exit;
        }
    }

    $error = true;
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
                <a href="tambah_admin.php" class="btn btn-outline-success" width="80%">Mulai</a>
            </form>
        </div>
        
    </nav>

    <section class="form">
        <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header bg-success">
                Halaman Login Admin
            </div>
            <div class="card-body align-content-lg-center mt-5">
                <div>
                    <?php if(isset($error)) { ?>
                        <p style="color:red; font-style:italic;">Username/Password yang anda masukkan salah!!!</p>
                    <?php } ?>
                </div>

                <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-8 mx-auto mb-4">
                        <input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                    </div>
                    <div class="col-sm-8 mx-auto">
                        <input type="password" name="password" class="form-control" id="name" placeholder="Masukkan Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                    </div>
                    <div class="col-sm-12 my-5">
                        <input class="cek" type="checkbox" name="ingat" id="ingat">
                        <label for="ingat">Ingat Saya</label>
                    </div>
                    <div class="col-sm-12 mx-auto mt-3">
                        <button class="btn btn-success" name="login" type="submit" >Login</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>