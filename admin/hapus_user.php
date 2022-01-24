<?php
session_start();

if(!isset($_SESSION['login_admin'])){
    header("location:login_admin.php");
    exit;
}

require '../prosedur.php';

$id_user = $_GET['id_user'];

if( hapus_user($id_user) > 0){
    echo "<script>
            alert('User berhasil dihapus');
            document.location.href='users.php';
        </script>";
} else {
    echo "<script>
            alert('User gagal dihapus');
            document.location.href='users.php';
        </script>";
}

?>