<?php include_once '../base.php';
$Vote->del(['acc'=>$_SESSION['admin'],'vote'=>$_GET['id']]);
$rows=$Pop->find($_GET['id']);
$rows['vote']--;
$Pop->save(['id'=>$_GET['id'],'vote'=>$rows['vote']]);
to($_SERVER["HTTP_REFERER"]);