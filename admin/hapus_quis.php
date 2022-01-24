<?php
session_start();

if(!isset($_SESSION['login_admin'])){
    header("location:login_admin.php");
    exit;
}

require '../prosedur.php';

$id_judul_quis = $_GET['id_judul_quis'];

if( hapus_quis($id_judul_quis) > 0){
    echo "<script>
            alert('Quis berhasil dihapus');
            document.location.href='mq.php';
        </script>";
} else {
    echo "<script>
            alert('Quis gagal dihapus');
            document.location.href='mq.php';
        </script>";
}

?>