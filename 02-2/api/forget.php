<?php include_once '../base.php';
if($Admin->count(['email'=>$_POST['email']])==1){
  $rows=$Admin->find(['email'=>$_POST['email']]);
  echo $rows['pw'];
}else{
  echo '查無此資料'.$_POST['email'];
}