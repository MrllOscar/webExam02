<?php include_once '../base.php';
if($Admin->count(['email'=>$_POST['email']])>=1){
$r=$Admin->find(['email'=>$_POST['email']]);
echo $r['pw'];
}else{
  echo '查無此資料';
}