<?php 

session_start();
session_unset();
$_SESSION = [];
session_destroy();

setcookie("id", "", time()-3600);
setcookie("nama", "", time()-3600);

header("location:login_admin.php");

?>