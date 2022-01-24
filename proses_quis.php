<?php 

session_start();
require 'prosedur.php';

if(isset($_SESSION['id_user'])){

    if(!isset($_SESSION['nilai'])){
        $_SESSION['nilai'] = 0;
    }
    
    if($_POST){
        $no_soal = $_POST['nomor'];
        //var_dump($no_soal);die;
        $_SESSION['no_soal'] = $_SESSION['no_soal'] + 1;
        $terpilih = $_POST['pilihan'];
        $next_no_soal = $no_soal + 1;
        //var_dump($next_no_soal);die;

        $query = "SELECT jawaban_benar FROM quis WHERE no_soal = $no_soal";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $jwb_benar = $row['jawaban_benar'];
        }

        if($jwb_benar == $terpilih){
            $_SESSION['nilai']++;
        }

        $query1 = "SELECT * FROM quis";
        $run = mysqli_query($conn , $query1);
        $total_soal = mysqli_num_rows($run);

        if ($no_soal == $total_soal) {
            header("location: hasil.php");
        }
        else {
            header("location: quis.php?n=".$next_no_soal);
        }
        }

} else {
    header("location:mq.php");
}







?>