<?php
session_start();

if(!isset($_SESSION['login_admin'])){
    header("location:login_admin.php");
    exit;
}

require '../prosedur.php';

$id_materi = $_GET['id_materi'];

if( hapus_materi($id_materi) > 0){
    echo "<script>
            alert('Materi berhasil dihapus');
            document.location.href='mq.php';
        </script>";
} else {
    echo "<script>
            alert('Materi gagal dihapus');
            document.location.href='mq.php';
        </script>";
}

?>