<?php include_once '../base.php'; 
  //count找$_GET就好，確認密碼需要再熟悉
  if($Account->count($_GET)){
    echo $Account->count($_GET);
    $_SESSION['user']=$_GET['acc'];
  }
  
  