<?php include_once '../base.php';
$Vote->save(['parent' => 0,'text'=>$_POST['title']]);
$row =$Vote->find(['text'=>$_POST['title']]);
foreach ($_POST['text'] as  $v) {
  $Vote->save(['parent' => $row['id'], 'text' => $v]);
}
to($_SERVER['HTTP_REFERER']);