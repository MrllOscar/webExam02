<?php include_once '../base.php';
  $Que->save(['text'=>$_POST['title'],'MID'=>0]);
  $rows=$Que->find(['text'=>$_POST['title']]);
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  foreach($_POST['text'] as $row){
    $Que->save(['text'=>$row,'MID'=>$rows['id']]);
    // $Que->save(['text'=>$row['text'],'MID'=>$rows['id']]);
  }
  to($_SERVER['HTTP_REFERER']);