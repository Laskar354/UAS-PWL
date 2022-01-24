<?php
session_start();

if(!isset($_SESSION['login_admin'])){
    header("location:login_admin.php");
    exit;
}

require '../prosedur.php';

$id_mapel = $_GET['id_mapel'];

if( hapus_mapel($id_mapel) > 0){
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href='mapel.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href='mapel.php';
          </script>";
}

?>