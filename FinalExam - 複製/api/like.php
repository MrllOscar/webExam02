<?php include_once '../base.php'; 
$Vote->save(['username'=>$_SESSION['user'],'favorite'=>$_GET['id']]);
to($_SERVER['HTTP_REFERER']);
