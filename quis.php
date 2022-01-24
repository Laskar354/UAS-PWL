<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit;
}
if(!isset($_SESSION['id_user'])){
    header("location:mq.php");
    exit;
}

require 'prosedur.php';

if(isset($_GET['no_soal']) && is_numeric($_GET['no_soal']) && isset($_GET['id_mapel']) && isset($_GET['id_judul_quis']) && isset($_GET['judul_quis'])){
    $no_soal = $_GET['no_soal'];
    $id_mpl = $_GET['id_mapel'];
    $ijq = $_GET['id_judul_quis'];
    $jq = $_GET['judul_quis'];
    if($no_soal == 1){
        $_SESSION['no_soal'] = 1;
        $_SESSION['id_mapel'] = $id_mpl;
        $_SESSION['id_judul_quis'] = $ijq;
        $_SESSION['judul_quis'] = $jq;
    } else {
        header("location:quis.php?no_soal=".$_SESSION['no_soal']);
    }
    $id_mapel = $_SESSION['id_mapel'];
}

//if(isset($_SESSION['no_soal']) && $_SESSION['no_soal'] == $no_soal){
    $soal = data("SELECT quis.*, judul_quis.judul_quis FROM quis INNER JOIN judul_quis ON quis.id_judul_quis = judul_quis.id_judul_quis WHERE quis.no_soal = '$no_soal'") ;
    //var_dump($soal);die;
//}

$q = "SELECT * FROM quis";
$result = mysqli_query($conn , $q);
$total_soal = mysqli_num_rows($result);
//var_dump($total_soal);die;


// $id_mapel = $_GET['id_mapel'];
// $id_judul_quis = $_GET['id_judul_quis'];
// $judul_quis = $_GET['judul_quis'];
//GET data biar tidak Error
//=============================================
// $id_mpl = '';
// if(isset($_GET['id_mapel'])){
//     $id_mpl = $_GET['id_mapel'];
//     $_SESSION['id_mapel'] = $id_mpl;
// }
// $id_mapel = $_SESSION['id_mapel'];
// //=============================================
// $id_jq = '';
// if(isset($_GET['id_judul_quis'])){
//     $id_jq = $_GET['id_judul_quis'];
//     $_SESSION['id_judul_quis'] = $id_jq;
// }
// $id_judul_quis = $_SESSION['id_judul_quis'];
// //=============================================
// $jq = '';
// if(isset($_GET['judul_quis'])){
//     $jq = $_GET['judul_quis'];
//     $_SESSION['judul_quis'] = $jq;
// }
// $judul_quis = $_SESSION['judul_quis'];



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
    <title>Quis</title>
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
                        <a class="nav-link" href="#">Submission</a>
                        <a class="nav-link " href="#">Subscribe</a>
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
                    <div>
                        <div class="pesan text-center">Saat ini quis belum tersedia!! <?php echo die; ?></div>
                    </div>
                    <div id="materi">Quis <?php echo $soal[0]['judul_quis']; ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h4 class="nav-soal">Soal ke <?php echo $no_soal; ?> dari <?php echo $total_soal; ?></h4>
                </div>
            </div>

            <?php foreach($soal as $s) { ?>

            <div class="row mt-5 mb-5">
                <div class="col-sm-12">
                    <h4> <?php echo $s['soal']; ?> </h4>
                </div>
            </div>
            <form method="POST" action="">
                <div class="row">
                    <div class="col-sm-12">
                            <div>
                                <input type="radio" name="pilihan" id="a" value="a">
                                <label for="a"> <?php echo $s['jawaban_a']; ?> </label>
                            </div>

                            <div  class="mt-1">
                                <input type="radio" name="pilihan" id="b" value="b">
                                <label for="b"> <?php echo $s['jawaban_b']; ?> </label>
                            </div>

                            <div  class="mt-1">
                                <input type="radio" name="pilihan" id="c" value="c">
                                <label for="c"> <?php echo $s['jawaban_c']; ?> </label>
                            </div>

                            <div  class="mt-1">
                                <input type="radio" name="pilihan" id="d" value="d">
                                <label for="d"> <?php echo $s['jawaban_d']; ?> </label>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary pr-5" type="submit" name="submit">Submit </button>
                                <input type="hidden" name="nomor" value="<?php $s['no_soal']; ?>" >
                            </div>
                    </div>
                </div>
            </form>

            <?php } ?>

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