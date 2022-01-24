<?php
session_start();

if(!isset($_SESSION['login_admin'])){
    header("location:login_admin.php");
    exit;
}

require '../prosedur.php';

$id_quis = $_GET['id_quis'];

if( hapus_soal($id_quis) > 0){
    echo "<script>
            alert('Soal berhasil dihapus');
            document.location.href='soal.php';
        </script>";
} else {
    echo "<script>
            alert('Soal gagal dihapus');
            document.location.href='soal.php';
        </script>";
}

?>