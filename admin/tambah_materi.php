<?php

session_start();

require '../prosedur.php';

if(!isset($_SESSION['login_admin'])){
    header('location:login_admin.php');
    exit;
}


if(isset($_POST["tambah_materi"])){

    //cek apakah data berhasil diinputkan
    if( tambah_materi($_POST) > 0 ){
        echo "<script>
                    alert('Data materi berhasil ditambahkan');
                    document.location.href='mq.php';
            </script>";
    }else{
        echo "<script>
                    alert('Data materi gagal ditambahkan');
                    document.location.href='mq.php';
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
    <title>Tambah Materi</title>
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
                        <a class="ms-4 btn btn-outline-dark border-pink ml-5" href="mq.php">Kembali</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12 text-center">
                    Tambah Materi
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
                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Materi</span>
                        <input name="nama_materi" type="text" class="form-control" placeholder="contoh : Sistem Tata Surya" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Video</span>
                        <input name="video" type="text" class="form-control" placeholder="Masukkan link video di sini" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Isi</span>
                        <textarea name="isi" type="text" class="form-control" placeholder="Masukkan isi materi disini" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></textarea>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <input name="status" type="hidden" class="form-control" value="gratis">
                        <input name="id_mapel" type="hidden" class="form-control" value="<?php echo $_SESSION['id_mapel'] ?>">
                        <input name="id_admin" type="hidden" class="form-control" value="<?php echo $_SESSION['id_admin']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-dark" type="submit" name="tambah_materi">Tambah Materi</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
</html>