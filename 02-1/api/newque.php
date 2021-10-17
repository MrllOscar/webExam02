<?php include_once '../base.php';

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$Que->save(["text"=>$_POST['title'],"MID"=>0]);
$rows=$Que->find(["text"=>$_POST['title'],"MID"=>0]);
foreach($_POST['text'] as $row){
  $Que->save(["text"=>$row,"MID"=>$rows['id']]);
}
to('?do=news.php');