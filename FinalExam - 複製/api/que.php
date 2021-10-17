<?php include_once '../base.php'; 
$Que->save(['text'=>$_POST['title'],'parent'=>0]);
$NewID=$Que->find(['text'=>$_POST['title']]);
foreach($_POST['text'] as $v){
  $Que->save(['parent'=>$NewID['id'],'text'=>$v]);
}
to($_SERVER['HTTP_REFERER']);