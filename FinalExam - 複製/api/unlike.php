<?php include_once '../base.php'; 
$Vote->del(['username'=>$_SESSION['user'],'favorite'=>$_GET['id']]);
to($_SERVER['HTTP_REFERER']);