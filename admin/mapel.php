<?php

session_start();

if(!isset($_SESSION['login_admin'])){
    header('location:login_admin.php');
    exit;
}

require '../prosedur.php';

$id = $_SESSION['id_admin'];

$mapel = data("SELECT mapel.*, admin.nama FROM mapel INNER JOIN admin ON mapel.id_admin=admin.id_admin WHERE admin.id_admin = $id ");

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
    <title>Classes</title>
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
                        <a class="nav-link" aria-current="page" href="index.php">Admin</a>
                        <a class="nav-link" href="mapel.php">Classes</a>
                        <a class="nav-link" href="users.php">Users</a>
                        <a class="nav-link" href="transaksi.php">Transaction</a>
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
                    Classes
                </div>
            </div>
        </div>
    </section>

    <section class="mapel mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-dark" href="tambah_mapel.php" role="button">Tambah Mapel</a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <table class="table table-success table-striped" border="2" cellpadding="30" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Mapel</th>
                            <th>Nama Admin</th>
                            <th>Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>

                        <?php $i=1; ?>
                        <?php foreach($mapel as $mpl) { ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $mpl['kelas']; ?></td>
                            <td><?php echo $mpl['nama_mapel'] ?></td>
                            <td><?php echo $mpl['nama'] ?></td>
                            <td><img src="gambarMapel/<?php echo $mpl['gambar'] ?>" alt="" width="40px"></td>
                            <td class="text-center">
                                <a href="edit_mapel.php?id_mapel= <?php echo $mpl['id_mapel']; ?>" class="btn btn-warning mr-2">Ubah</a>
                                <a href="mq.php?id_mapel= <?php echo $mpl['id_mapel']; ?>" class="btn btn-success mr-2">M&Q</a>
                                <a href="hapus_mapel.php?id_mapel= <?php echo $mpl['id_mapel']; ?>" class="btn btn-danger" 
                                onclick="return confirm('Apakah anda yakin menghapus data tersebut?')" >Hapus</a>
                            </td>
                        </tr>

                        <?php $i++; ?>
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