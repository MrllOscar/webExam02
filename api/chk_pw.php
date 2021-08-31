<?php include_once '../base.php';

if($Admin->count($_GET)){
  echo $Admin->count($_GET);
  $_SESSION['admin']=$_GET['acc'];
};
?>