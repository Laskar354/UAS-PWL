<?php

session_start();

require '../prosedur.php';

if(!isset($_SESSION['login_admin'])){
    header('location:login_admin.php');
    exit;
}


if(isset($_POST["buat_soal"])){

    //cek apakah data berhasil diinputkan
    if( buat_soal($_POST) > 0 ){
        echo "<script>
                    alert('Data Soal berhasil dibuat!');
                    document.location.href='soal.php';
            </script>";
    }else{
        echo "<script>
                    alert('Data Soal gagal dibuat!');
                    document.location.href='soal.php';
            </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../Bahan/icofont/icofont.min.css">
    <title>Buat Soal</title>
</head>
<body class="bodyhome">
    <section class="home">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand ms-4" href="#">FindK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav ms-auto">
                        <a class="ms-4 btn btn-outline-dark border-pink ml-5" href="soal.php">Kembali</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12 text-center">
                    Buat Soal
                </div>
            </div>
        </div>
    </section>

    <section class="mapel+ mt-5">
        <div class="container">
            <form action="" method="POST">
            <div class="row mt-5">
                <div class="col-sm-12">

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">No Soal</span>
                        <input name="no_soal" type="number" class="form-control" placeholder="Masukkan Soal" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Soal</span>
                        <input name="soal" type="text" class="form-control" placeholder="Masukkan Soal" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Jawaban A</span>
                        <input name="jwb_a" type="text" class="form-control" placeholder="" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Jawaban B</span>
                        <input name="jwb_b" type="text" class="form-control" placeholder="" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Jawaban C</span>
                        <input name="jwb_c" type="text" class="form-control" placeholder="" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Jawaban D</span>
                        <input name="jwb_d" type="text" class="form-control" placeholder="" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Jawaban Benar</span>
                        <input name="jwb_benar" type="text" class="form-control" placeholder="Jawaban Benar" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <input name="id_mapel" type="hidden" class="form-control" value="<?php echo $_SESSION['id_mapel'] ?>">
                        <input name="id_judul_quis" type="hidden" class="form-control" value="<?php echo $_SESSION['id_judul_quis']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-dark" type="submit" name="buat_soal">Buat Soal</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
</html>