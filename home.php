<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location:login.php');
}

?>


<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="Bahan/icofont/icofont.min.css">
    <title>Home</title>
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
            <h1>Online learning made easier <br> With US</h1>
            <h2 class="mb-4">We are help for education in the world. We make world a better place.</h2>
            <a href="mapel.php" class="btn-get-started">Choose Class</a>
        </div>
    </section>

    <section class="about mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="judul">About Us</div>
                    <hr class="mb-5">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mt-3">
                    <h3>FindK adalah jawaban untuk semua permasalahan pembelajaran daring</h3>
                    <p class="fst-italic">Informatika 04 2019 :</p>
                        <i class="icofont-check-circled"></i> 19.11.2817 | La Ode Muhamad Laskar Jihad <br>

                        <p class="mt-2"><b>FindK</b> dirancang oleh kami setelah ditemukannya banyak permasalahan pada masa pembelajaran daring yang terjadi di sekolah-sekolah. Selain itu kami menyediakan banyak materi yang bisa di akses secara gratis maupun berbayar. Tentunya jika berlangganan anda akan mendapatkan akses materi yang lebih luas.</p>

                </div>
                <div class="col-sm-6 ">
                    <img class="img-fluid" src="Bahan/daringimg.jpg" alt="">
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