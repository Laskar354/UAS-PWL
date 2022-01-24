<?php

session_start();
require 'prosedur.php';

// cek cookie, karena kita buat cookie = username maka cek usernamenya apakah sudah benar
if(isset($_COOKIE['id']) && isset($_COOKIE['uname'])){
    $id = $_COOKIE['id'];
    $uname = $_COOKIE['uname'];
    
    // ambil username berdasarkan id, samakan dulu apakah sudah sama dengan cookie uname
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);
    // cek cookie dan username
    if($uname === hash("sha256", $row['username'])){
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $row['id_user'];
    }
}

// cek session apakah masih ada
if(isset($_SESSION['login'])){
    header("location:home.php");
    exit;
}



if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // cek username dan password apakah ada dalam database
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1){ // fungsi ini mengembalikan baris, jika ada maka hasilnya jumlah baris
        // kalau ada cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {; // cek password apakah sama dengan password yg di enkripsi dari fungsi password_hash
            // set session
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];

            // cek cookie
            if(isset($_POST['ingat'])){
                //buat cookienya
                setcookie("id", $row['id_user'], time()+3600);
                setcookie("uname", hash("sha256", $row['username']), time()+3600);
            }

            header("location:home.php");
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
                <a href="registration.php" class="btn btn-outline-success">Mulai</a>
            </form>
        </div>
    </nav>

    <section class="form">
        <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header bg-success">
                Halaman Login
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
                        <input type="text" name="username" class="form-control" id="name" placeholder="Masukkan username" required>
                    </div>
                    <div class="col-sm-8 mx-auto">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="col-sm-12 my-3">
                        <input class="cek" type="checkbox" name="ingat" id="ingat">
                        <label for="ingat">Ingat Saya</label>
                    </div>
                    <div class="col-sm-8 mx-auto">
                        <div class="d-grid">
                            <button class="btn btn-success rounded-pill" name="login" type="submit" >Login</button>
                        </div>
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