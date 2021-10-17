<?php include_once '../base.php';
  if($Admin->count(['email'=>$_POST['email']])){
  $rows=$Admin->find(['email'=>$_POST['email']]);
  echo "您的密碼為：".$rows['pw'];
  }else{
    echo "查無此資料";
  }
