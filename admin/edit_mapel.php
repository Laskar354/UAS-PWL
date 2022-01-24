<?php

session_start();

require '../prosedur.php';

if(!isset($_SESSION['login_admin'])){
    header('location:login.php');
    exit;
}

$id = $_GET['id_mapel'];

$mpl = data("SELECT * FROM mapel WHERE id_mapel = $id")['0'];

if(isset($_POST["edit_mapel"])){


    //cek apakah data berhasil diinputkan
    if( edit_mapel($_POST) > 0 ){
        echo "<script>
                    alert('Data mapel berhasil di Ubah');
                    document.location.href='mapel.php';
            </script>";
    }else{
        echo "<script>
                    alert('Data mapel gagal di Ubah');
                    document.location.href='mapel.php';
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
    <title>About</title>
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
                        <a class="ms-4 btn btn-outline-dark border-pink ml-5" href="mapel.php">Kembali</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12 text-center">
                    Edit Mapel
                </div>
            </div>
        </div>
    </section>

    <section class="mapel+ mt-5">
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <input type="hidden" name="id_mapel" value="<?php echo $mpl['id_mapel'] ?>">
                    <input type="hidden" name="gambar_lama" value="<?php echo $mpl['gambar'] ?>">
                    <div>
                        <h3/>Kosongkan jika tidak ingin mengubah data</h3>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Kelas</span>
                        <input name="kelas" type="text" class="form-control" value="<?php echo $mpl['kelas'] ?>" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Nama Mapel</span>
                        <input name="nama_mapel" type="text" class="form-control" value="<?php echo $mpl['nama_mapel'] ?>" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group">
                        <span class="input-group-text" id=""><img src="gambarMapel/<?php echo $mpl['gambar']; ?>" required width="100px" alt=""></span>
                        <input name="gambar" type="file" class="form-control">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <input name="id_admin" type="hidden" class="form-control" value="<?php echo $_SESSION['id_admin'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-dark" type="submit" name="edit_mapel">Edit Mapel</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
</html>