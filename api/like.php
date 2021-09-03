<?php include_once '../base.php';
// var_dump($_POST);
  $Good->save(['user'=>$_SESSION['user'],'good'=>$_GET['id']]);
  $row=$Text->find(['id'=>$_GET['id']]);
  $row['good']++;
  $Text->save(['id'=>$_GET['id'],'good'=>$row['good']]);
  to($_SERVER['HTTP_REFERER']);