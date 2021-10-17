<?php include_once '../base.php';

$Vote->save(['acc'=>$_SESSION['admin'],'vote'=>$_GET['id']]);
$new=$News->find($_GET['id']);
$new['vote']++;
$News->save(['id'=>$_GET['id'],'vote'=>$new['vote']]);
to($_SERVER["HTTP_REFERER"]);