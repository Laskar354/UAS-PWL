<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit;
}

require 'prosedur.php';

$id = $_GET['id_mapel'];

$id_user = $_SESSION['id_user'];
// $row = data("SELECT * FROM user WHERE id_user = $id_user");
// var_dump($row);die;


//$materi = data("SELECT materi.*, admin.nama FROM materi INNER JOIN admin ON materi.id_admin = admin.id_admin WHERE id_mapel = $id");

//var_dump($materi);die;

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="Bahan/icofont/icofont.min.css">
    <title>M&Q</title>
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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        <a class="nav-link" href="about.php">About</a>
                        <a class="nav-link" href="mapel.php">Classes</a>
                        <a class="nav-link" href="submission.php">Submission</a>
                        <a class="nav-link " href="subs.php">Subscribe</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="ms-4 btn btn-outline-dark border-pink" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="muka d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12">
                    Materi
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">

            <?php
                $query = "SELECT * FROM user WHERE id_user = $id_user";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                if($row['status'] == 'gratis'){
                    $query = "SELECT materi.*, admin.nama FROM materi INNER JOIN admin ON materi.id_admin = admin.id_admin WHERE id_mapel = $id AND materi.status = 'gratis'";
                    $run = mysqli_query($conn, $query);
                } else {
                    $query = "SELECT materi.*, admin.nama FROM materi INNER JOIN admin ON materi.id_admin = admin.id_admin WHERE id_mapel = $id";
                    $run = mysqli_query($conn, $query);
                }
            
            ?>

                <?php if(mysqli_num_rows($run) > 0) {?> 

                    <?php while($mtr = mysqli_fetch_assoc($run)){ ?>
                        <div class="col-sm-12">
                            <a class="link" href="detail_materi.php?id_mapel=<?php echo $mtr['id_mapel'];?>&id_materi=<?php echo $mtr['id_materi']; ?>">
                                <div class="mq d-flex flex-row mb-3">
                                    <div class="p-3"> <i class="icofont-book-alt fs-5"></i> <?php echo $mtr['nama']; ?> Memposting materi : <?php echo $mtr['nama_materi']; ?> </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="pesan text-center">Saat ini materi belum tersedia!!</div>
                <?php } ?>

            </div>
        </div>
    </section>

    <section class="muka d-flex justify-content-center align-items-center mt-5">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="judul col-sm-12">
                    Quis
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">

            <?php 
                $query = "SELECT judul_quis.*, admin.nama FROM judul_quis INNER JOIN admin ON judul_quis.id_admin = admin.id_admin WHERE id_mapel = $id";
                $result = mysqli_query($conn, $query);
            ?>
            <?php if(mysqli_num_rows($result) > 0) { ?>
                
                <?php while($q = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-sm-12">
                        <a class="link" href="quis.php?id_mapel=<?php echo $q['id_mapel'];?>&id_judul_quis=<?php echo $q['id_judul_quis']; ?>&judul_quis=<?php echo $q['judul_quis'] ?>&no_soal=1">
                            <div class="mq d-flex flex-row mb-3">
                                <div class="p-3"> <i class="icofont-instrument fs-5"></i> <?php echo $q['nama']; ?> Memposting Quis : <?php echo $q['judul_quis']; ?> </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            <?php } else { ?>
                <div class="pesan text-center">Saat ini quis belum tersedia!!</div>
            <?php } ?>
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