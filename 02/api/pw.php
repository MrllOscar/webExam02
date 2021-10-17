<?php include_once '../base.php';
  $rows=$User->find(['acc'=>$_POST['acc']]);
  if($rows['pw']==$_POST['pw']){
    echo 1;
    $_SESSION['user']=$_POST['acc'];
  }