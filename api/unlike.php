<?php include_once '../base.php';
  $Good->del(['good'=>$_GET['id'],'user'=>$_SESSION['user']]);
  $row=$Text->find(['id'=>$_GET['id']]);
  $row['good']--;
  $Text->save(['id'=>$_GET['id'],'good'=>$row['good']]);
  to($_SERVER['HTTP_REFERER']);