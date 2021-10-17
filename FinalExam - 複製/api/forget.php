<?php include_once '../base.php'; 
  $rows=$Account->find(['email'=>$_POST['email']]);
  if(!empty($rows)){
    //er1 不是isset是!empty
    // 不用拆開foreach($rows as $v)
    echo $rows['pw'];
  }else{
    echo '查無此資料';
  }
  
  