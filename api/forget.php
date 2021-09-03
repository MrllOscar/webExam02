<?php include_once '../base.php';
  $row=$User->count(['email'=>$_POST['email']]);
  if($row>=1){
  $rows=$User->find(['email'=>$_POST['email']]);
    echo $rows['pw'];
  }else{
    echo '查無此資料';
  }