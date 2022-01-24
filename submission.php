<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit;
}

require 'prosedur.php';

$id = $_SESSION['id_user'];

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
    <title>Submission</title>
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
                <div class="judul col-sm-12 text-center">
                    Submission
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">
                <table class="table">

                    

                    <?php $i = 1; ?>
                    <?php 
                        $query = "SELECT submission.*, user.username FROM submission INNER JOIN user ON submission.id_user = user.id_user";
                        $run = mysqli_query($conn, $query);
                    ?>

                    <?php if(mysqli_num_rows($run) > 0) { ?>
                    
                    <?php while($sub = mysqli_fetch_assoc($run)) { ?>

                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $sub['judul']; ?></td>
                            <td><?php echo $sub['kelas']; ?></td>
                            <td><?php echo $sub['nilai']; ?></td>
                        </tr>
                    <?php } ?>

                    <?php $i++; ?>
                    <?php } else { ?>
                        <div class="pesan text-center">Saat ini data submission belum ada!!</div>
                    <?php } ?>

                    </tbody>
                </table>
                
                

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