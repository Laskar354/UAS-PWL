<?php

session_start();

if(!isset($_SESSION['login_admin'])){
    header('location:login_admin.php');
    exit;
}

require '../prosedur.php';


$id = '';
if(isset($_GET['id_mapel'])){
    $id = $_GET['id_mapel'];
    $_SESSION['id_mapel'] = $id;
}
$id_mapel = $_SESSION['id_mapel'];


$materi = data("SELECT materi.*, admin.nama FROM materi INNER JOIN admin ON materi.id_admin = admin.id_admin WHERE id_mapel = $id_mapel ");

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
    <title>Materi dan Quiz</title>
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
                        <a class="nav-link" aria-current="page" href="#materi">Materi</a>
                        <a class="nav-link" href="#quis">Quis</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="ms-4 btn btn-outline-dark border-pink" href="mapel.php">Kembali</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12 text-center">
                    <div id="materi">Materi</div>
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-dark" href="tambah_materi.php" role="button">Tambah Materi</a>
                </div>
            </div>

            <div class="row mt-5 mb-5">
                <div class="col-sm-12">
                    <table class="table table-success table-striped" border="2" cellpadding="30" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Materi</th>
                            <th>Pemosting</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Detail</th>
                        </tr>


                        <?php $i = 1; ?>
                        <?php foreach($materi as $mtr) { ?>

                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $mtr['nama_materi']; ?> </td>
                            <td> <?php echo $mtr['nama']; ?> </td>
                            <td class="text-center">
                                <a href="edit_materi.php?id_materi=<?php echo $mtr['id_materi']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="hapus_materi.php?id_materi=<?php echo $mtr['id_materi']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus materi ini?')">Hapus</a>
                            </td>
                            <td class="text-center">
                                <a href="detail_materi.php?id_mapel=<?php echo $mtr['id_mapel']; ?>&id_materi=<?php echo $mtr['id_materi']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12 text-center">
                    <div id="quis">Quis</div>
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-dark" href="tambah_quis.php" role="button">Tambah Quis</a>
                </div>
            </div>
            

            <?php
            
            $quis = data("SELECT judul_quis.*, admin.nama FROM judul_quis INNER JOIN admin ON judul_quis.id_admin = admin.id_admin WHERE id_mapel = $id_mapel ");
            //var_dump($quis);die;
            
            ?>
            
            <div class="row mt-5">
                <div class="col-sm-12">
                    <table class="table table-success table-striped" border="2" cellpadding="30" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Quis</th>
                            <th>Pemosting</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Soal</th>
                        </tr>
                        
                        <?php $j = 1; ?>
                        <?php foreach($quis as $q) { ?>

                        <tr>
                            <td> <?php echo $j; ?> </td>
                            <td> <?php echo $q['judul_quis']; ?> </td>
                            <td> <?php echo $q['nama']; ?> </td>
                            <td class="text-center">
                                <a href="edit_quis.php?id_judul_quis=<?php echo $q['id_judul_quis']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="hapus_quis.php?id_judul_quis=<?php echo $q['id_judul_quis']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Quis ini?')">Hapus</a>
                            </td>
                            <td class="text-center">
                                <a href="soal.php?id_mapel=<?php echo $q['id_mapel']; ?>&id_judul_quis=<?php echo $q['id_judul_quis']; ?>&judul_quis=<?php echo $q['judul_quis']; ?>" class="btn btn-primary">Soal</a>
                            </td>
                        </tr>

                        <?php $j++; ?>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-5 mb-5">
        <div  class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <div class="footer_f">FindK</div>
                    <p>
                    Jalan Ringroad Utara <br>
                    Sleman, DI Yogyakarta 55811<br>
                    Indonesia <br><br>
                    <strong>Phone:</strong> +62<br>
                    <strong>Email:</strong> findk@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <div class="footer_f">Usefull Links</div>
                    <i class="icofont-rounded-right"></i> <a href="#">Home</a> <br>
                    <i class="icofont-rounded-right"></i> <a href="#">About us</a> <br>
                    <i class="icofont-rounded-right"></i> <a href="#">Services</a> <br>
                    <i class="icofont-rounded-right"></i> <a href="#">Terms of service</a><br>
                    <i class="icofont-rounded-right"></i> <a href="#">Privacy policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>