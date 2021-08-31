<?php include_once '../base.php';

  $Que->save(['text'=>$_POST['title'],'parent'=>0,'vote'=>0]);
  $theid=$Que->find(['text'=>$_POST['title']])['id'];

    foreach($_POST['text'] as $v){
  $Que->save(['text'=>$v,'parent'=>$theid,'vote'=>0]);

    }
  to('../backend.php?do=que');

?>