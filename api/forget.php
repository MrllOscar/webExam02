<?php include_once '../base.php';
if(!empty($Admin->find(['email'=>$_GET['e']]))){
  echo '你的密碼為:'.$Admin->find(['email'=>$_GET['e']])['pw'];
}else{
  echo '查無此資料';
};
?>