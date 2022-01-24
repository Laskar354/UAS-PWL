<?php

session_start();

require 'prosedur.php';

if(!isset($_SESSION['login'])){
    header('location:login.php');
}


if(isset($_POST['bayar'])){
    
    if(transaksi($_POST) > 0){
        echo "<script>
                alert('Data transaksi berhasil di input!! Status berlangganan akan segera kami kirim di email anda');
                document.location.href='home.php';
            </script>";
    } else {
        echo "<script>
                alert('Data transaksi gagal di input!!');
            </script>";
            mysqli_error($conn);
    }
}
$tgl = date('d-m-Y', time() + 7776000);
//var_dump($tgl);die;

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
    <title>Transaksi</title>
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
                    Pembayaran
                </div>
            </div>
            
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 mx-auto">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4>Nama Bank : BPD</h4>
                            <h4>Kode Bank : 112</h4>
                            <h4>No REK : 042.221.016435(La Ode M Laskar Jihad) </h4> <br>
                            <h4>Total Bayar : Rp. 30.000 </h4>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <h5>Sebelum mengisi form dibawah ini, lakukan pembayaran terlebih dahulu di bank atau ATM terdekat</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-7 mx-auto">

                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="harga" value="30000">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <input type="hidden" name="sampai_tgl" value="<?php echo $tgl; ?>">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Pembayaran</span>
                            <input name="tgl_bayar" type="date" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group">
                            <span class="input-group-text" id="">Bukti Pembayaran</span>
                            <input name="bukti" type="file" class="form-control">
                        </div>

                        <div class="d-grid mt-3">
                            <button class="btn btn-success" type="submit" name="bayar">Konfirmasi</button>
                        </div>
                    </form>

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
                    <i class="icofont-rounded-right"></i> <a href="about.php">About us</a> <br>
                    <i class="icofont-rounded-right"></i> <a href="#">Services</a> <br>
                    <i class="icofont-rounded-right"></i> <a href="#">Terms of service</a><br>
                    <i class="icofont-rounded-right"></i> <a href="#">Privacy policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>